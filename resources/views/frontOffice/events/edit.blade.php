@extends('frontOffice.frontoffice_layout')

@section('frontoffice')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="post-project">
        <h1 style="font-size: 2em; margin-top: 20px;"><center>Edit Event<center></h1>

        <form method="POST" action="{{ route('events.update', ['event' => $event->id]) }}">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-lg-12">
                    <br>
                    <br>
            <!-- Event Name -->
            <div class="form-group">
                <label for="title">Event Name:</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $event->title }}" required>
            </div>

            <!-- Event Type -->
            <div class="form-group">
                <label for="type">Event Type:</label>
                <select name="type" id="type" class="form-control">
                    <option value="Webinar" @if($event->type === 'Webinar') selected @endif>Webinar</option>
                    <option value="Workshop" @if($event->type === 'Workshop') selected @endif>Workshop</option>
                    <option value="Fair" @if($event->type === 'Fair') selected @endif>Fair</option>
                    <option value="Competition" @if($event->type === 'Competition') selected @endif>Competition</option>
                    <option value="Seminar" @if($event->type === 'Seminar') selected @endif>Seminar</option>
                    <option value="Program" @if($event->type === 'Program') selected @endif>Program</option>
                    <option value="Virtual chat" @if($event->type === 'Virtual chat') selected @endif>Virtual chat</option>
                </select>
            </div>


            <!-- Event Description -->
            <div class="form-group">
                <label for="description">Event Description:</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ $event->description }}</textarea>
            </div>

            <!-- Event Date and Time -->
            <div class="form-group">
                <label for="eventDateTime">Event Date and Time:</label>
                <input type="datetime-local" name="eventDateTime" id="eventDateTime" class="form-control" value="{{ $event->eventDateTime }}" required>
            </div>

            <!-- Reservation Deadline -->
            <div class="form-group">
                <label for="reservationDeadline">Reservation Deadline:</label>
                <input type="date" name="reservationDeadline" id="reservationDeadline" class="form-control" value="{{ $event->reservationDeadline }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Event</button>
        </form>
    </div>
            </div></div>
</div>
</div>
</main>
@endsection
