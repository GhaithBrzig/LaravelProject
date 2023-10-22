@extends('frontOffice.frontoffice_layout')

@section('frontoffice')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="post-event">
                    <h1><center>Post an Event</center></h1>

                    <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data" novalidate>
                        @csrf

                        <div class="form-group">
                            <label for="title">Event Title:</label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" required>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="type">Event Type:</label>
                            <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                                <option value="Webinar">Webinar</option>
                                <option value="Workshop">Workshop</option>
                                <option value="Fair">Fair</option>
                                <option value="Competition">Competition</option>
                                <option value="Seminar">Seminar</option>
                                <option value="Program">Program</option>
                                <option value="Virtual chat">Virtual chat</option>
                            </select>
                            @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description" required></textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="eventDateTime">Event Date and Time:</label>
                            <input type="datetime-local" name="eventDateTime" id="eventDateTime" class="form-control @error('eventDateTime') is-invalid @enderror" required>
                            @error('eventDateTime')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="reservationDeadline">Reservation Deadline:</label>
                            <input type="date" name="reservationDeadline" id="reservationDeadline" class="form-control @error('reservationDeadline') is-invalid @enderror" required>
                            @error('reservationDeadline')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="eventImage">Event Image URL:</label>
                                <input class="form-control @error('eventImage') is-invalid @enderror" name="eventImage" type="file" id="eventImage">
                                @error('eventImage')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="numberParticipants">Maximum Capacity of Participants:</label>
                            <input type="number" name="numberParticipants" id="numberParticipants" class="form-control @error('numberParticipants') is-invalid @enderror">
                            @error('numberParticipants')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-lg-12 text-center">
                            <button class="btn btn-primary" type="submit">Post</button>
                            <a href="{{ route('events.index') }}" class="btn btn-secondary" title="Cancel">Back to Events</a>
                        </div>
                    </form>
                </div><!--post-event end-->
            </div>
        </div>
    </div>
</main>
@endsection
