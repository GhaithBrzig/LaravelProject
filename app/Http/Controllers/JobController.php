<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $query = Job::query();

        // Apply filters if provided in the request
        if ($request->has('search-skills')) {
            $query->whereHas('tags', function ($subQuery) use ($request) {
                $subQuery->where('tagName', 'like', '%' . $request->input('search-skills') . '%');
            });
        }

        if ($request->has('search-description')) {
            $searchTerm = $request->input('search-description');
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('description', 'like', '%' . $searchTerm . '%')
                    ->orWhereHas('tags', function($tagQuery) use ($searchTerm) {
                        $tagQuery->where('tagName', 'like', '%' . $searchTerm . '%');
                    })
                    ->orWhere('location', 'like', '%' . $searchTerm . '%');
            });
        }

        if ($request->has('search-location')) {
            $query->where('location', $request->input('search-location'));
        }


        $jobs = $query->get();

        return view('frontoffice.Jobs.index', compact('jobs'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('frontoffice.Jobs.create', compact('tags'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'title' => 'required',
            'skills' => ['required', 'min:1'],
            'price1' => 'required',
            'location' => 'required',
            'description' => 'required',
        ]);

        // Create a new job
        $job = new Job;
        $job->title = $request->title;
        $job->user_id = auth()->user()->id;; // Assuming user_id is numeric
        $job->salary = $request->price1;
        $job->location = $request->location;
        $job->description = $request->description;
        $job->save();

        $job->tags()->attach($request->skills);
        return redirect()->route('jobs.index')->with('success', 'Job created successfully');
    }

    public function show($id)
    {
        $job = Job::findOrFail($id);
        return view('frontoffice.Jobs.show', compact('job'));
    }

    public function edit($id)
    {
        $job = Job::findOrFail($id);
        $tags = Tag::all();
        return view('frontoffice.Jobs.edit', compact('job', 'tags'));
    }

    public function update(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'title' => 'required',
            'skills' => ['required', 'min:1'],
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

    public function destroy($id)
    {
        $job = Job::findOrFail($id);

        // Delete the job
        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully');
    }
}
