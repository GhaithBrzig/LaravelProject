@extends('frontOffice.frontoffice_layout')

@section('frontoffice')
<div class="container mt-5">
    <br>
    <br>
    <br>
    <h4 class="font-weight-bold text-center mb-4 mt-4">Event Details</h4> <!-- Add top margin -->

    <div class="card mx-auto mt-4" style="max-width: 400px;">
        <div class="card-header bg-orange text-white">
            <h5 class="card-title text-center">{{ $event->title }}</h5>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Event Type:</strong> {{ $event->type }}</li>
                <li class="list-group-item"><strong>Description:</strong> {{ $event->description }}</li>
                <li class="list-group-item"><strong>Organizer:</strong> {{ $user ? $user->name : 'N/A' }}</li>
                <li class="list-group-item"><strong>Event Date and Time:</strong> {{ $event->eventDateTime }}</li>
                <li class="list-group-item"><strong>Reservation Deadline:</strong> {{ $event->reservationDeadline }}</li>
                
            </ul>

            <div class="text-center mt-3">
                <a href="{{ route('events.index') }}" class="custom-btn">Back to Events</a>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom button style */
    .custom-btn {
        background-color: #e34d3a; /* Orange color */
        color: white; /* White text */
        padding: 10px 20px; /* Adjust padding as needed */
        border: none; /* Remove default border */
        border-radius: 5px; /* Add some border radius for rounded corners */
        font-size: 16px; /* Adjust font size as needed */
        cursor: pointer; /* Add pointer cursor on hover */
    }

    /* Orange color for card header */
    .bg-orange {
        background-color: #e34d3a;
    }
</style>
@endsection
