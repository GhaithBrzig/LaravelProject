@extends('layouts.app')

@section('content')
    <h1>Events</h1>

    <a href="{{ route('events.create') }}" class="btn btn-primary">Create Event</a>

    <table class="table">
        <thead>
            <tr>
                <th>Event Name</th>
                <th>Description</th>
                <th>Event Type</th>
                <th>Organizer</th>
                <th>Event Date and Time</th>
                <th>Reservation Deadline</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eventData as $data)
                <tr>
                    <td>{{ $data['event']->title }}</td>
                    <td>{{ $data['event']->description }}</td>
                    <td>{{ $data['event']->type }}</td>
                    <td>{{ $data['user'] ? $data['user']->name : 'N/A' }}</td>
                    <td>{{ $data['event']->eventDateTime }}</td>
                    <td>{{ $data['event']->reservationDeadline }}</td>
                    <td>
                        <a href="{{ route('events.show', ['event' => $data['event']->id]) }}" class="btn btn-info">View</a>
                        <a href="{{ route('events.edit', ['event' => $data['event']->id]) }}" class="btn btn-warning">Edit</a>
                        <form method="POST" action="{{ route('events.destroy', ['event' => $data['event']->id]) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
