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
        $request->validate([
            'title' => 'required',
            'type' => 'required|in:Webinar,Workshop,Fair,Competition,Seminar,Program,Virtual chat',
            'user_id' => 'required|integer',
            'description' => 'required',
            'eventDateTime' => 'required',
            'reservationDeadline' => 'required',
        ]);

        Event::create($request->all());

        return redirect()->route('events.index')->with('success', 'Event has been created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $event= Event::findOrFail($id);
        $user=User::findOrFail($event->user_id);
        return view('frontoffice.Events.show', compact('event','user'));
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



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   $event = Event::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'type' => 'required|in:Webinar,Workshop,Fair,Competition,Seminar,Program,Virtual chat',
            'user_id' => 'required',
            'description' => 'required',
            'eventDateTime' => 'required',
            'reservationDeadline' => 'required',
        ]);

        $event->fill($request->post())->save();

        return redirect()->route('events.index')->with('success', 'Event has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   $event=Event::findOrFail($id);
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event has been deleted successfully');
    }
}
