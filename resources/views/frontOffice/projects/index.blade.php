@extends('frontOffice.frontoffice_layout')

@section('frontoffice')
    <h1>Projects</h1>

    <a href="{{ route('projects.create') }}" class="btn btn-primary">Create Project</a>

    <table class="table">
        <thead>
            <tr>
                <th>Project Name</th>
                <th>Description</th>
                <th>Owner</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projectData as $data)
                <tr>
                    <td>{{ $data['project']->name }}</td>
                    <td>{{ $data['project']->description }}</td>
                    <td>{{ $data['client'] ? $data['client']->name : 'N/A' }}</td>
                    <td>{{ $data['project']->start_date }}</td>
                    <td>{{ $data['project']->end_date }}</td>
                    <td>
                        <a href="{{ route('projects.show', ['project' => $data['project']->id]) }}" class="btn btn-info">View</a>
                        <a href="{{ route('projects.edit', ['project' => $data['project']->id]) }}" class="btn btn-warning">Edit</a>
                        <form method="POST" action="{{ route('projects.destroy', ['project' => $data['project']->id]) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
