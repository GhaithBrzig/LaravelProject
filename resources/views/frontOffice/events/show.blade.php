@extends('frontOffice.frontoffice_layout')

@section('frontoffice')
<div class="container mt-5">
    <br>
    <br>
    <br>
    <h4 class="font-weight-bold text-center mb-4 mt-4">Event Details</h4> <!-- Add top margin -->

    <div class="row">
        <div class="col-md-6">
            <div class="card mx-auto mt-4" style="max-width: 400px;">
                <div class="card-header bg-orange text-white">
                    <h5 class="card-title text-center">{{ $event->title }}</h5>
                    <!-- Add this button to your event details view -->

                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Event Type:</strong> {{ $event->type }}</li>
                        <li class="list-group-item"><strong>Description:</strong> {{ $event->description }}</li>
                        <li class="list-group-item"><strong>Organizer:</strong> {{ $user ? $user->name : 'N/A' }}</li>
                        <li class="list-group-item"><strong>Event Date and Time:</strong> {{ $event->eventDateTime }}</li>
                        <li class="list-group-item"><strong>Reservation Deadline:</strong> {{ $event->reservationDeadline }}</li>
                        <li class="list-group-item">
                            <img id="eventImage" class="w-48 mr-6 mb-6" src="{{ Vite::asset('storage/app/public/' . $event->eventImage) }}" alt="">
                        </li>
                    </ul>
                </div>
                <div class="text-center mt-3">
                    <a href="{{ route('events.index') }}" class="custom-btn">Back to Events</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="widget widget-user">
                <h3 class="title-wd">Users who made reservations:</h3>
                <ul>
                    @foreach ($userData as $data)
                    <li>
                        <div class="usr-msg-details">
                            <div class="usr-ms-img">
                                <img src="images/resources/m-img1.png" alt="">
                            </div>
                            <div class="usr-mg-info">
                                <h3>{{ $data['name'] }}</h3>
                                <p>{{ $data['username'] }}</p>
                            </div><!--usr-mg-info end-->
                        </div>
                        <span>Reservation Date: {{ $data['reservationDate'] }}</span>
                    </li>
                    @endforeach
                </ul>
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
