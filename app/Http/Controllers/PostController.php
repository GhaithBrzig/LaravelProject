<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\like;
use App\Models\Comment;
use Illuminate\Http\Request;

class PostController extends Controller
{
     // Display a list of posts
    public function index()
    {
        $user = auth()->user();
        $posts = Post::latest()->filter(request(['category','search']))->paginate(10); // Retrieve posts, latest first, and paginate them

        // Check if the user has liked each post and add this information to the posts
         $posts->each(function ($post) use ($user) {
            $post->likedByUser = !$user->likes()->where('post_id', $post->id)->exists();
    });
        return view('frontoffice.posts.index', compact('posts'));
    }
    

    public function like(Post $post)
{
    $user = auth()->user();
        
    // Check if the user has already liked the post
    if (!$user->likes()->where('post_id', $post->id)->exists()) {
        // Increment the post's likes count
        $post->increment('likes');
        // Create a like record for the user and the post
        $like = new Like(['user_id' => $user->id, 'post_id' => $post->id]);
        $like->save();
    } else {
        // User has already liked the post, so unlike it
        // Decrement the post's likes count
        $post->decrement('likes');
        // Remove the like record
        $user->likes()->where('post_id', $post->id)->delete();
    }


    return redirect()->back();
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
            'category' => 'required|string|in:Career Advice,Success Stories,Mentorship,Entrepreneurship',
            'photo' => 'image|mimes:jpeg,png,jpg,gif', // Adjust file type and size as needed
        ]); 
        $user_id = auth()->user()->id;
       
        $post = new Post;
        $post->title = $request->title;
        $post->user_id =  $user_id;
        $post->content = $request->content;
        $post->category = $request->category;
        $post->likes =  0;
        if($request->hasFile('photo')) {
            $post-> photo =    $request->file('photo')->store('posts', 'public');
        }
       
        $post->save();

       

        return redirect()->route('posts.index')->with('success', 'Job created successfully');
    }
    
       
    public function store_comment(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'content' => 'required',
            
        ]);
        $user_id = auth()->user()->id;
        // Create a new comment
        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->user_id = $user_id;
        $comment->post_id =  $id;      
    
        $comment->save();

        $comments = Comment::where('post_id', $id)
        ->with('user') // Eager loading the associated user
        ->orderBy('created_at', 'desc')
        ->get();


        $post = Post::findOrFail($id);
        return redirect()->back();
   
    } 
   


    public function show($id)
    {
      // Retrieve comments for the specified post, ordered by creation date
      $comments = Comment::where('post_id', $id)
      ->with('user') // Eager loading the associated user
      ->orderBy('created_at', 'desc')
      ->get();


        $post = Post::findOrFail($id);
        return view('frontoffice.posts.show',compact('post','comments'));
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
            'category' => 'required|string|in:Career Advice,Success Stories,Mentorship,Entrepreneurship',
            'content' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif', 
            
        ]);
        $post = Post::findOrFail($id);

        $post->title = $request->title;
        //$post->user_id = "1";
        $post->content = $request->content;
        $post->category = $request->category;
       /// $post->likes =  "1";
       if($request->hasFile('photo')) {
        $post-> photo =    $request->file('photo')->store('posts', 'public');
        }
        $post->save();

        return redirect()->route('posts.index')->with('success','Post Has Been updated successfully');
    }
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index')->with('success','Post has been deleted successfully');
    }

   

    public function delete_comment($comment)
    {
        // Find and delete the comment
        $deletedComment = Comment::find($comment);

        if (!$deletedComment) {
            return redirect()->back()->with('error', 'Comment not found.');
        }

        $deletedComment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }


}
