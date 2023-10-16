@extends('frontOffice.frontoffice_layout')

@section('frontoffice')
    <h1>Edit Project</h1>

    <form method="POST" action="{{ route('projects.update', ['project' => $project->id]) }}">
        @csrf
        @method('PUT')

        <!-- Project Name -->
        <div class="form-group">
            <label for="name">Project Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $project->name }}" required>
        </div>


        <!-- Owner (User) Selection -->
        <div class="form-group">
            <label for="client_id">Owner:</label>
            <select name="client_id" id="client_id" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id === $project->user_id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Project Description -->
        <div class="form-group">
            <label for="description">Project Description:</label>
            <textarea name="description" id="description" class="form-control" required>{{ $project->description }}</textarea>
        </div>

        <!-- Project Start Date -->
        <div class="form-group">
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $project->start_date }}" required>
        </div>

        <!-- Project End Date -->
        <div class="form-group">
            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $project->end_date }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Project</button>
    </form>
@endsection
