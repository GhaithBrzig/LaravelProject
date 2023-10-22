<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        $eventData = [];

        foreach ($events as $event) {
            $user = User::find($event->user_id);
            $eventData[] = [
                'event' => $event,
                'user' => $user,
            ];
        }

        return view('frontOffice.events.index', compact('eventData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Fetch the list of users
        $users = User::all();

        return view('frontOffice.Events.create', compact('users'));
    }


/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'title' => 'required',
        'type' => 'required|in:Webinar,Workshop,Fair,Competition,Seminar,Program,Virtual chat',
        'description' => 'required',
        'eventDateTime' => 'required',
        'reservationDeadline' => 'required',
        'numberParticipants' => 'required',
    ]);

    // Get the current user's ID
    $user_id = auth()->user()->id;

    // Create a new event with the user_id set to the current user's ID
    $eventData = $request->only(['title', 'type', 'description', 'eventDateTime', 'reservationDeadline', 'numberParticipants']);
    $eventData['user_id'] = $user_id;

    // Check if an eventImage file was uploaded
    if ($request->hasFile('eventImage')) {
        $eventData['eventImage'] = $request->file('eventImage')->store('events', 'public');
    }

    // Create the event with the merged data
    Event::create($eventData);

    return redirect()->route('events.index')->with('success', 'Event has been created successfully.');
}

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);

        $user_id = auth()->user()->id;
        $user = User::findOrFail($user_id);

        $userData = [];

        if ($event) {
            // Get the users for the event with pivot data
            $users = $event->users()->withPivot('reservationDate', 'specialkey')->get();

            // Collect the user data in an array
            foreach ($users as $u) {
                $reservationDate = $u->pivot->reservationDate;
                $specialkey = $u->pivot->specialkey;
                $userData[] = [
                    'user_id' => $u->id,
                    'name' => $u->name,
                    'username' => $u->username,
                    'profileImage' => $u->profileImage, // Replace with the actual attribute name for the profile image
                    'reservationDate' => $reservationDate,
                    'specialkey' => $specialkey,
                ];
            }
        }

        return view('frontoffice.Events.show', compact('event', 'user', 'userData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Find the event by its ID
        $event = Event::findOrFail($id);

        // Fetch a list of users for the organizer selection
        $users = User::all();

        return view('frontoffice.Events.edit', compact('event', 'users'));
    }



    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->fill($request->post())->save();



        return redirect()->route('events.index')->with('success', 'Event has been created successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->users()->detach(); // Detach all associated users
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event has been deleted successfully');
    }




    public function attachUserToEvent(Request $request)
    {
        $user = auth()->user(); // Get the current authenticated user
        $eventId = $request->input('event_id'); // Retrieve the event ID from the request

        $event = Event::find($eventId); // Fetch the event dynamically

        if (!$event) {
            return redirect()->back()->with('error', 'Event not found.');
        }

        $user->events()->attach($event, [
            'reservationDate' => now(),
            'specialkey' => 'abc111111',
        ]);

        return redirect()->back()->with('success', 'User attached to event successfully.');
    }



    public function detachUserFromEvent(Request $request)
    {
        $user = User::find(1); // You can change this to fetch the user dynamically
        $event = Event::find(1); // You can change this to fetch the event dynamically
        $user->events()->detach($event);

        return redirect()->back()->with('success', 'User detached from event successfully.');
    }


    public function syncUserEvents(Request $request)
    {
        $user = User::find(1); // You can change this to fetch the user dynamically
        $eventsData = [
            1 => ['reservationDate' => now(), 'specialkey' => 'abc'],
            2 => ['reservationDate' => now(), 'specialkey' => 'def'],
        ];
        $user->events()->sync($eventsData);

        return redirect()->back()->with('success', 'User events synced successfully.');
    }
}
