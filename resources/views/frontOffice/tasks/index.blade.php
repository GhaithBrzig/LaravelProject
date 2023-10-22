@extends('frontOffice.frontoffice_layout')

@section('frontoffice')
<main>

  <div class="timeline">

    <div >
        <a href="/projects/{{ $project->id }}/tasks/create" class="timeline_button">
            Add Task
        </a>


    </div>

    @foreach($tasks as $task)
    <div class="timeline__event animated fadeInUp timeline__event--type3">
        <div class="timeline__event__icons">
          <a href="/projects/{{ $project->id }}/tasks/{{ $task->id }}/edit" title="Edit">
            <i class="fas fa-edit text-primary"></i>
        </a>


            <a title="Delete" onclick="confirmDelete('{{ $task->taskName }}', {{ $task->id }})">
                <i class="fas fa-trash text-danger"></i>
            </a>
        </div>
        <div class="timeline__event__icon">
          <i class="lni-cake"></i>
          <div class="timeline__event__date">
            {{ $task->startDate }}
          </div>
        </div>
        <div class="timeline__event__content">
          <div class="timeline__event__title">
            {{ $task->taskName }}
          </div>
          <div class="timeline__event__description">
            <p>{{ $task->description }}</p>
          </div>
        </div>
      </div>
      <form id="delete-task-{{ $task->id }}" action="{{ route('projects.tasks.destroy', ['project' => $project->id,'task' => $task->id]) }}"
        method="POST" style="display: none;" data-job-title="{{ $task->taskName }}">
      @csrf
      @method('DELETE')
  </form>
    @endforeach

    <script>
        function confirmDelete(Title, Id) {
            var confirmation = confirm("Are you sure you want to delete this task: " + Title + "?");
            if (confirmation) {
                document.getElementById('delete-task-' + Id).submit();
            }
        }
    </script>

  </div>

</main>
@endsection
