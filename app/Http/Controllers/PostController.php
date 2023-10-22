<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class PostController extends Controller
{
     // Display a list of posts
    public function index()
    {
        $posts = Post::latest()->filter(request(['category']))->paginate(10); // Retrieve posts, latest first, and paginate them

        return view('frontoffice.posts.index', compact('posts'));
    }
    

    public function like(Post $post)
{
    $oldLikes = $post->likes; // Get the old like count
    $newLikes = $oldLikes + 1; // Increment the like count by 1
    $post->update(['likes' => $newLikes]); // Save the updated like count

    return redirect()->back(); // Redirect back to the post
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
            'content' => 'required',
            'category' => 'required|string',
            
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
        if ($comment) {
            // Access the associated post's ID through the relationship
            $postId = $comment->post->id;
           
        }
        $deletedComment->delete();

        // Retrieve the post
        $post = Post::findOrFail($postId);

        // Retrieve the remaining comments for the post
        $comments = Comment::where('post_id', $postId)
            ->with('user') // Eager loading the associated user
            ->orderBy('created_at', 'desc')
            ->get();

            return redirect()->route('posts.show', ['post' => $post,'comments' => $comment])
            ->with('success', 'Comment deleted successfully');
    }


}
