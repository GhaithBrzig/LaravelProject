<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
class EventBackOfficeController extends Controller
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

        return view('backOffice.eventsBack.index', compact('eventData'));
    }
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('eventsBack.index')->with('success', 'Event has been deleted successfully');
    }




}
