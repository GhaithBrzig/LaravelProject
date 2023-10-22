<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Tag;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Service::with('tags') // Eager load the 'tags' relationship
            ->latest()
            ->paginate(5);

        return view('frontoffice.service.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $tags = Tag::pluck('tagName', 'id'); // Retrieve tag names and IDs
        return view('frontoffice.service.create', compact('tags'));    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'serviceName'          =>  'required',
            'pricePerHour'          =>  'required',
            'description'          =>  'required',
            'type'         =>  'required'
        ]);


        $service = new Service;

        $service->serviceName = $request->serviceName;
        $service->pricePerHour = $request->pricePerHour;
        $service->description = $request->description;
        $service->type = $request->type;

        $service->save();

        // Attach the selected tags to the service
        $selectedTags = $request->input('tag_ids'); // Assuming you use 'tag_ids' in your form
        $service->tags()->attach($selectedTags);

        return redirect()->route('service.index')->with('success', 'service Added successfully.');;
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('frontoffice.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'serviceName'          =>  'required',
            'pricePerHour'          =>  'required',
            'description'          =>  'required',
            'type'         =>  'required'
        ]);


        $service->fill($request->post())->save();

        return redirect()->route('service.index')->with('success', 'service Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('service.index')->with('success', 'service has been deleted successfully');
    }
}
