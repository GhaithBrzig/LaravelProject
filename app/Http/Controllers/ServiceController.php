<?php

namespace App\Http\Controllers;

use App\Models\Service;
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
        $data = Service::latest()->paginate(5);

        return view('frontoffice.service.index',compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {

        return view('frontoffice.service.create');
    }

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
        return view('frontoffice.service.edit',compact('service'));
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
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        //     'address' => 'required',
        // ]);
        
        $service->fill($request->post())->save();

        return redirect()->route('service.index')->with('success','service Has Been updated successfully');
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
        return redirect()->route('service.index')->with('success','service has been deleted successfully');
    }
  
}
