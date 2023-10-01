<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
     // Display a list of posts
    public function index()
    {
        $posts = Post::latest()->paginate(10); // Retrieve posts, latest first, and paginate them

        return view('frontoffice.posts.index', compact('posts'));
    }

    public function create()
    {

        return view('frontoffice.posts.create');
    }


    // Store a newly created post in the database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category' => 'required|string',
            
        ]);
        $post = new Post;
        $post->title = $request->title;
        $post->user_id = "1";
        $post->content = $request->content;
        $post->category = $request->category;
        $post->likes =  "1";
        $post->save();

       

        return redirect()->route('posts.index')->with('success', 'Job created successfully');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('frontoffice.posts.show',compact('post'));
    }

    public function edit( $id)
    {
        $post = Post::findOrFail($id);
        return view('frontoffice.posts.edit',compact('post'));
    }

    public function update(Request $request,  $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category' => 'required|string',
            
        ]);
        $post = Post::findOrFail($id);

        $post->title = $request->title;
        //$post->user_id = "1";
        $post->content = $request->content;
        $post->category = $request->category;
       /// $post->likes =  "1";
        $post->save();

        return redirect()->route('frontoffice.posts.index')->with('success','Post Has Been updated successfully');
    }
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index')->with('success','Post has been deleted successfully');
    }

}
