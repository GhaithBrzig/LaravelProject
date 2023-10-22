<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Http\Requests\ProjectRequest;

class ProjectController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        $projectData = [];

        foreach ($projects as $project) {
            $client = User::find($project->client_id);

            $projectData[] = [
                'project' => $project,
                'client' => $client,
            ];
        }

        return view('frontoffice.projects.index', compact('projectData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    // Fetch a list of users who can be assigned as project owners
    $users = User::all();

    return view('frontoffice.projects.create', compact('users'));
}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'client_id' => 'required|integer',
            'description' => 'required|string|min:15',
            'start_date' => 'required|date|after_or_equal:today', // Start date should be today or later
            'end_date' => 'required|date|after:start_date', // End date must be after the start date
            'budget' => 'required|numeric',
            'currentProgress' => 'required|numeric|between:1,10',
        ], [
            'name.required' => 'The project name is required.',
            'client_id.required' => 'Please select an owner for the project.',
            'description.required' => 'A project description is required and should be at least 15 characters.',
            'start_date.required' => 'Please select a start date.',
            'start_date.after_or_equal' => 'The start date should be today or later.',
            'end_date.required' => 'Please select an end date.',
            'end_date.after' => 'The end date must be after the start date.',
            'budget.required' => 'Please specify the project budget.',
            'currentProgress.required' => 'Please specify the current progress of the project.',
            'currentProgress.between' => 'The current progress should be between 1 and 10.',
        ]);

        // Create a new project
        Project::create($request->all());

        return redirect()->route('projects.index')->with('success', 'Project has been created successfully.');
    }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::findOrFail($id);
        $client = User::find($project->client_id);
        $createdBy = User::find($project->createdBy);

        return view('frontoffice.projects.show', compact('project', 'client', 'createdBy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $users = User::all(); // Assuming you want to display users in the edit form

        return view('frontoffice.projects.edit', compact('project', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'client_id' => 'required|integer',
            'description' => 'required|string|min:15',
            'start_date' => 'required|date|after_or_equal:today', // Start date should be today or later
            'end_date' => 'required|date|after:start_date', // End date must be after the start date
            'budget' => 'required|numeric',
            'currentProgress' => 'required|numeric|between:1,10',
        ], [
            'name.required' => 'The project name is required.',
            'client_id.required' => 'Please select an owner for the project.',
            'description.required' => 'A project description is required and should be at least 15 characters.',
            'start_date.required' => 'Please select a start date.',
            'start_date.after_or_equal' => 'The start date should be today or later.',
            'end_date.required' => 'Please select an end date.',
            'end_date.after' => 'The end date must be after the start date.',
            'budget.required' => 'Please specify the project budget.',
            'currentProgress.required' => 'Please specify the current progress of the project.',
            'currentProgress.between' => 'The current progress should be between 1 and 10.',
        ]);

        // Find the project by ID
        $project = Project::findOrFail($id);

        // Update project details
        $project->update($request->all());

        return redirect()->route('projects.index')->with('success', 'Project has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        var_dump($id);
        $project = Project::findOrFail($id);
        logger('Deleting project: ' . $project->name);
        // Delete the project
        $project->delete();
        logger('Project deleted successfully');

        return redirect()->route('projects.index')->with('success', 'Project has been deleted successfully.');
    }
}
