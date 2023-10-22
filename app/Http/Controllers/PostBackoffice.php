<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostBackoffice extends Controller
{
    public function index()
    {
        $posts = Post::latest()->filter(request(['category','search']))->paginate(10); // Retrieve posts, latest first, and paginate them

        return view('backoffice.posts.index', compact('posts'));
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }

   
}


