

@extends('frontOffice.frontoffice_layout')

@section('frontoffice')

<div class="container mx-auto">
    <div class="col-lg-8">
        <div class="post-task">
            <div class="center">
                <br><br><br><br><br>
                <h1 style="font-size: 25px; font-weight: bold;"><center>Create a New Task</center></h1>
                <br><br><br><br>
                <form method="POST" action="/projects/{{ $project->id }}/tasks" novalidate>


                    @csrf

                    <div class="form-group">
                        <label for="taskName" style="font-size: 15px; font-weight: bold;">Task Name:</label>
                        <br> <br>
                        <input type="text" name="taskName" id="taskName" class="form-control @error('taskName') is-invalid @enderror" required>
                        @error('taskName')
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
                        <label for="startDate" style="font-size: 15px; font-weight: bold;">Start Date:</label>
                        <br> <br>
                        <input type="date" name="startDate" id="startDate" class="form-control @error('startDate') is-invalid @enderror" required>
                        @error('startDate')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
                    </div>

                    <div class="form-group">
                        <label for="endDate" style="font-size: 15px; font-weight: bold;">End Date:</label>
                        <br> <br>
                        <input type="date" name="endDate" id="endDate" class="form-control @error('endDate') is-invalid @enderror" required>
                        @error('endDate')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
                    </div>

                    <br> <br><br>
                    <div class="col-lg-12 text-center">
                        <button class="btn btn-primary" type="submit">Create Task</button>


                    </div>
                </form>
            </div><!--post-task end-->
        </div>
    </div>
</div>
@endsection
