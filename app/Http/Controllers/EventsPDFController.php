<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use PDF;

class EventsPDFController extends Controller
{
    public function index(Request $request)
	{
	    $events = Event::all();

	    $data = [
	            'title' => 'How To Create PDF File Using DomPDF In Laravel 9 - Techsolutionstuff',
	            'date' => date('d/m/Y'),
	            'events' => $events
	    ];

	    if($request->has('download'))
	    {
	        $pdf = PDF::loadView('frontOffice.EventsPDF.index',$data);
	        return $pdf->download('events.pdf');
	    }

	    return view('frontOffice.EventsPDF.index',compact('events','data'));
	}

}
