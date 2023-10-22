@extends('frontOffice.frontoffice_layout')

@section('frontoffice')
<main>
    <div class="container mx-auto">

            <div class="col-lg-8">
                <div class="post-project">

                        <br><br><br><br><br>
                    <h1 style="font-size: 25px; font-weight: bold;"><center>Edit Your Project</center></h1>
                    <br><br><br><br>

                    <form method="POST" action="{{ route('projects.update', ['project' => $project->id]) }}">
                        @csrf
                        @method('PUT')

                        <!-- Project Name -->
                        <div class="form-group">
                            <label for="name" style="font-size: 15px; font-weight: bold;">Project Name:</label>
                            <br> <br>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $project->name }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Owner (User) Selection -->
                        <div class="form-group">
                            <label for="client_id" style="font-size: 15px; font-weight: bold;">Owner:</label>
                            <br> <br>
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
                            <label for="description" style="font-size: 15px; font-weight: bold;">Description:</label>
                            <br> <br>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" required>{{ $project->description }}</textarea>
                            @error('description')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
                        </div>

                        <!-- Project Start Date -->
                        <div class="form-group">
                            <label for="start_date" style="font-size: 15px; font-weight: bold;">Start Date:</label>
                            <br> <br>
                            <input type="date" name="start_date" id="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ $project->start_date }}" required>
                            @error('start_date')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
                        </div>

                        <!-- Project End Date -->
                        <div class="form-group">
                            <label for="end_date" style="font-size: 15px; font-weight: bold;">End Date:</label>
                            <br> <br>
                            <input type="date" name="end_date" id="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ $project->end_date }}" required>
                            @error('end_date')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
                        </div>

                         <!-- Project Budget -->
                    <div class="form-group">
                        <label for="budget" style="font-size: 15px; font-weight: bold;">Budget:</label>
                        <br> <br>
                        <input type="number" name="budget" id="budget" class="form-control @error('budget') is-invalid @enderror" value="{{ $project->budget }}" required>
                        @error('budget')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
                    </div>

                    <!-- Project Current Progress -->
                    <div class="form-group">
                        <label for="currentProgress" style="font-size: 15px; font-weight: bold;">Current Progress:</label>
                        <br> <br>
                        <input type="number" name="currentProgress" id="currentProgress" class="form-control @error('currentProgress') is-invalid @enderror" value="{{ $project->currentProgress }}" required>
                        @error('currentProgress')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
                    </div>

                        <button type="submit" class="btn btn-primary">Update Project</button>
                    </form>
                </div>

        </div>
    </div>
</main>
@endsection
