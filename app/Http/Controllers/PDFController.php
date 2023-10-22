<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use PDF;
class PDFController extends Controller
{
    public function index(Request $request)
	{
	    $posts = Post::all();

	    $data = [
	            'title' => 'How To Create PDF File Using DomPDF In Laravel 9 - Techsolutionstuff',
	            'date' => date('d/m/Y'),
	            'posts' => $posts
	    ];

	    if($request->has('download'))
	    {
	        $pdf = PDF::loadView('frontOffice.PDF.index',$data);
	        return $pdf->download('posts.pdf');
	    }

	    return view('frontOffice.PDF.index',compact('posts','data'));
	}
}
