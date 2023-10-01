@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Event Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $event->title }}</h5>
                <p class="card-text"><strong>Event Type:</strong> {{ $event->type }}</p>
                <p class="card-text"><strong>Description:</strong> {{ $event->description }}</p>
                <p class="card-text"><strong>Organizer:</strong> {{ $user ? $user->name : 'N/A' }}</p>
                <p class="card-text"><strong>Event Date and Time:</strong> {{ $event->eventDateTime }}</p>
                <p class="card-text"><strong>Reservation Deadline:</strong> {{ $event->reservationDeadline }}</p>

                <a href="{{ route('events.index') }}" class="btn btn-primary">Back to Events</a>
            </div>
        </div>
    </div>
@endsection
