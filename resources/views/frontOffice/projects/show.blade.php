@extends('frontOffice.frontoffice_layout')

@section('frontoffice')
    <div class="container">
        <h1>Project Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $project->name }}</h5>
                <p class="card-text"><strong>Description:</strong> {{ $project->description }}</p>
                <p class="card-text"><strong>Owner:</strong> {{ $client ? $client->name : 'N/A' }}</p>
                <p class="card-text"><strong>Start Date:</strong> {{ $project->start_date }}</p>
                <p class="card-text"><strong>End Date:</strong> {{ $project->end_date }}</p>

                <a href="{{ route('projects.index') }}" class="btn btn-primary">Back to Projects</a>
            </div>
        </div>
    </div>
@endsection
