<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Job;
class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::all();
        return view('frontoffice.Jobs.index',compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('frontoffice.Jobs.create', compact('tags'));
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
            'title' => 'required',
            'skills' => 'required',
            'price1' => 'required',
            'location' => 'required',
            'description' => 'required',
        ]);

        // Create a new job
        $job = new Job;
        $job->title = $request->title;
        $job->user_id = "1";
        $job->salary = $request->price1;
        $job->location = $request->location;
        $job->description = $request->description;
        $job->save();

        $job->tags()->attach($request->skills);
        return redirect()->route('jobs.index')->with('success', 'Job created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::findOrFail($id);
        return view('frontoffice.Jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::findOrFail($id);
        $tags = Tag::all(); // Assuming you want to display tags in the edit form
        return view('frontoffice.Jobs.edit', compact('job', 'tags'));
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
            'title' => 'required',
            'skills' => 'required',
            'price1' => 'required',
            'location' => 'required',
            'description' => 'required',
        ]);

        // Find the job by ID
        $job = Job::findOrFail($id);

        // Update job details
        $job->title = $request->title;
        $job->salary = $request->price1;
        $job->location = $request->location;
        $job->description = $request->description;
        $job->save();

        // Sync tags
        $job->tags()->sync($request->skills);

        return redirect()->route('jobs.index')->with('success', 'Job updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::findOrFail($id);

        // Delete the job
        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully');
    }
}
