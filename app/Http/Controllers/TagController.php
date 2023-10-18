<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
class TagController extends Controller
{
    public function index()
    {
         $data = Tag::latest()
            ->paginate(5);
        return view('backoffice.tag.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backoffice.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $tag = new Tag;

        $tag->tagName = $request->tagName;
        $tag->save();

        return redirect()->route('tags.index');
    }

      /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index')->with('success', 'tag has been deleted successfully');
    }
}
