@extends('frontOffice.frontoffice_layout')

@section('frontoffice')
    <h1>Create Project</h1>

    <form method="POST" action="{{ route('projects.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Project Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>



        <div class="form-group">
            <label for="client_id">Owner</label>
            <select name="client_id" id="client_id" class="form-control" required>
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
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" id="end_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Project</button>
    </form>
@endsection
