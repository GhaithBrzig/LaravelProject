@extends('layouts.app')

@section('content')
    <h1>Create Event</h1>

    <form method="POST" action="{{ route('events.store') }}">
        @csrf
        <div class="form-group">
            <label for="title">Event Name</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="type">Event Type:</label>
            <select name="type" id="type" class="form-control">
                <option value="Webinar">Webinar</option>
                <option value="Workshop">Workshop</option>
                <option value="Fair">Fair</option>
                <option value="Competition">Competition</option>
                <option value="Seminar">Seminar</option>
                <option value="Program">Program</option>
                <option value="Virtual chat">Virtual chat</option>
            </select>
        </div>


        <div class="form-group">
            <label for="user_id">Organizer</label>
            <select name="user_id" id="user_id" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="eventDateTime">Event Date and Time</label>
            <input type="datetime-local" name="eventDateTime" id="eventDateTime" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="reservationDeadline">Reservation Deadline</label>
            <input type="date" name="reservationDeadline" id="reservationDeadline" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Event</button>
    </form>
@endsection
