<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
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
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'client_id' => 'required|integer',
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
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'client_id' => 'required|integer',
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
        $project = Project::findOrFail($id);

        // Delete the project
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project has been deleted successfully.');
    }
}
