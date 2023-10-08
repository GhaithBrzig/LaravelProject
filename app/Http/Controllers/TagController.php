<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('frontoffice.home',compact('tags'));
    }
}
