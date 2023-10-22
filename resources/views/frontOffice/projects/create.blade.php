@extends('frontOffice.frontoffice_layout')

@section('frontoffice')

    <div class="container mx-auto">

            <div class="col-lg-8">
                <div class="post-project">
                    <div class="center">
                        <br><br><br><br><br>
                    <h1 style="font-size: 25px; font-weight: bold;"><center>Create Your Project</center></h1>
                    <br><br><br><br>
                    <form method="POST" action="{{ route('projects.store') }}" novalidate>
                        @csrf

                        <div class="form-group">
                            <label for="name" style="font-size: 15px; font-weight: bold;">Project Name:</label>
                            <br> <br>

                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="client_id" style="font-size: 15px; font-weight: bold;">Owner:</label>
                            <br> <br>
                            <select name="client_id" id="client_id" class="form-control @error('client_id') is-invalid @enderror" required>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('client_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="description" style="font-size: 15px; font-weight: bold;">Description:</label>
                            <br> <br>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="4" required></textarea>
    @error('description')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
                        </div>

                        <div class="form-group">
                            <label for="start_date" style="font-size: 15px; font-weight: bold;">Start Date:</label>
                            <br> <br>
                            <input type="date" name="start_date" id="start_date" class="form-control @error('start_date') is-invalid @enderror" required>
    @error('start_date')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
                        </div>

                        <div class="form-group">
                            <label for="end_date" style="font-size: 15px; font-weight: bold;">End Date:</label>
                            <br> <br>
                            <input type="date" name="end_date" id="end_date" class="form-control @error('end_date') is-invalid @enderror" required>
    @error('end_date')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
                        </div>

                        <div class="form-group">
                            <label for="Budget" style="font-size: 15px; font-weight: bold;">Budget:</label>
                            <br> <br>
                            <input type="number" name="budget" id="budget" class="form-control @error('budget') is-invalid @enderror" required>
    @error('budget')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
                        </div>

                        <div class="form-group">
                            <label for="currentProgress" style="font-size: 15px; font-weight: bold;">Current Progress:</label>
                            <br> <br>
                            <input type="number" name="currentProgress" id="currentProgress" class="form-control @error('currentProgress') is-invalid @enderror" required>
    @error('currentProgress')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
                        </div>

                        <br> <br><br>
                        <div class="col-lg-12 text-center">
                            <button class="btn btn-primary" type="submit">Create Project</button>
                            <a href="{{ route('projects.index') }}" class="btn btn-secondary" title="Cancel">Back to Projects</a>
                        </div>
                    </form>
                </div><!--post-project end-->
                </div>
        </div>
    </div>
@endsection
