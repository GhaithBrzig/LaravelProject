<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;

class TaskController extends Controller
{
    /**
     * Display a listing of tasks for a specific project.
     *
     * @param  int  $projectId
     * @return \Illuminate\Http\Response
     */
    public function index($projectId)
    {
        $project = Project::findOrFail($projectId);
        $tasks = Task::where('project_id', $projectId)->get();

        return view('frontoffice.tasks.index', compact('project', 'tasks'));
    }

    /**
     * Show the form for creating a new task for a specific project.
     *
     * @param  int  $projectId
     * @return \Illuminate\Http\Response
     */
    public function create($projectId)
    {
        // Fetch the project based on the provided project ID
        $project = Project::findOrFail($projectId);

        // You can fetch any additional data required for the create view here

        return view('frontoffice.tasks.create', compact('project'));
    }


    /**
     * Store a newly created task for a specific project in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $projectId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $projectId)
    {
        $request->validate([
            'taskName' => 'required|string|max:255',
            'description' => 'required|string|min:15',
            'startDate' => 'required|date|after_or_equal:today',
            'endDate' => 'required|date|after:startDate',

        ], [
            'taskName.required' => 'The task name is required.',
            'description.required' => 'A task description is required and should be at least 15 characters.',
            'startDate.required' => 'Please select a start date.',
            'startDate.after_or_equal' => 'The start date should be today or later.',
            'endDate.required' => 'Please select an end date.',
            'endDate.after' => 'The end date must be after the start date.',


        ]);


        // Create a new task associated with the project
        Task::create([
            'taskName' => $request->input('taskName'),
            'description' => $request->input('description'),
            'startDate' => $request->input('startDate'),
            'endDate' => $request->input('endDate'),
            'budget' => $request->input('budget'),
            'currentProgress' => $request->input('currentProgress'),
            'project_id' => $projectId, // Set the project_id attribute
        ]);

        return redirect("/projects/{$projectId}/tasks")->with('success', 'Task has been created successfully.');


    }

    /**
     * Display all tasks for a specific project.
     *
     * @param  int  $projectId
     * @return \Illuminate\Http\Response
     */
    public function show($projectId)
    {
        $project = Project::findOrFail($projectId);
        $tasks = Task::where('project_id', $projectId)->get();

        return view('frontoffice.tasks.show', compact('project', 'tasks'));
    }

    /**
     * Show the form for editing a specific task for a project.
     *
     * @param  int  $projectId
     * @param  int  $taskId
     * @return \Illuminate\Http\Response
     */
    public function edit($projectId, $taskId)
    {
        $project = Project::findOrFail($projectId);
        $task = Task::findOrFail($taskId);

        return view('frontoffice.tasks.edit', compact('project', 'task'));
    }

    /**
 * Update the specified task for a specific project in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $projectId
 * @param  int  $taskId
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, $projectId, $taskId)
{
    // Validate the form data
    $request->validate([
        'taskName' => 'required|string|max:255',
        'description' => 'required|string|min:15',
        'startDate' => 'required|date|after_or_equal:today',
        'endDate' => 'required|date|after:startDate',

    ], [
        'taskName.required' => 'The task name is required.',
        'description.required' => 'A task description is required and should be at least 15 characters.',
        'startDate.required' => 'Please select a start date.',
        'startDate.after_or_equal' => 'The start date should be today or later.',
        'endDate.required' => 'Please select an end date.',
        'endDate.after' => 'The end date must be after the start date.',


    ]);

    // Find the project and task by IDs
    $project = Project::findOrFail($projectId);
    $task = Task::findOrFail($taskId);

    // Update task details
    $task->update([
        'taskName' => $request->input('taskName'),
        'description' => $request->input('description'),
        'startDate' => $request->input('startDate'),
        'endDate' => $request->input('endDate'),
    ]);

    // Since you're updating the task, you don't need to update the project_id attribute.

    return redirect("/projects/{$projectId}/tasks")->with('success', 'Task has been updated successfully.');
}


    /**
     * Remove the specified task from storage.
     *
     * @param  int  $projectId
     * @param  int  $taskId
     * @return \Illuminate\Http\Response
     */
    public function destroy($projectId, $taskId)
    {
        $task = Task::findOrFail($taskId);

        // Delete the task
        $task->delete();

        return redirect("/projects/{$projectId}/tasks")->with('success', 'Task has been deleted successfully.');
    }
}



