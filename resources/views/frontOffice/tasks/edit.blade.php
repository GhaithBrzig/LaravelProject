
@extends('frontOffice.frontoffice_layout')

@section('frontoffice')
<main>
    <div class="container mx-auto">
        <div class="col-lg-8">
            <div class="post-project">
                <br><br><br><br><br>
                <h1 style="font-size: 25px; font-weight: bold;"><center>Edit Your Task</center></h1>
                <br><br><br><br>

                <form method="POST" action="{{ route('projects.tasks.update', ['project' => $project->id,'task' => $task->id]) }}" novalidate>
                    @csrf
                    @method('PUT')

                    <!-- Task Name -->
                    <div class="form-group">
                        <label for="taskName" style="font-size: 15px; font-weight: bold;">Task Name:</label>
                        <br> <br>
                        <input type="text" name="taskName" id="taskName" class="form-control @error('taskName') is-invalid @enderror" value="{{ $task->taskName }}" required>
                        @error('taskName')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>

                    <!-- Task Description -->
                    <div class="form-group">
                        <label for="description" style="font-size: 15px; font-weight: bold;">Description:</label>
                        <br> <br>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" required>{{ $task->description }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Task Start Date -->
                    <div class="form-group">
                        <label for="startDate" style="font-size: 15px; font-weight: bold;">Start Date:</label>
                        <br> <br>
                        <input type="date" name="startDate" id="startDate" class="form-control @error('startDate') is-invalid @enderror" value="{{ $task->startDate }}" required>
                        @error('startDate')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
                    </div>

                    <!-- Task End Date -->
                    <div class="form-group">
                        <label for="endDate" style="font-size: 15px; font-weight: bold;">End Date:</label>
                        <br> <br>
                        <input type="date" name="endDate" id="endDate" class="form-control @error('endDate') is-invalid @enderror" value="{{ $task->endDate }}" required>
                        @error('endDate')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update Task</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
