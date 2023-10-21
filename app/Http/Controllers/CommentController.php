<?php

namespace App\Http\Controllers;
use App\Models\Comment;

use Illuminate\Http\Request;

class CommentController extends Controller
{

   

    

       
    public function store_comment(Request $request, $id)
    {
       // Validate the request data
       $request->validate([
        'content' => 'required',
        
    ]);

    // Create a new comment
    $comment = new Comment();
    $comment->content = $request->input('content');
    $comment->user_id = "1";
    $comment->post_id =  $id;      
   
    $comment->save();
    return redirect('posts/'.$id)->with('success','Comment has been submitted.');
   
    } 
    public function edit($id)
    {
        $comment = Comment::find($id);

        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'content' => 'required',
        ]);

        // Find the comment by ID
        $comment = Comment::find($id);

        // Update the comment
        $comment->content = $request->input('content');
        $comment->save();

        return redirect()->back()->with('success', 'Comment updated successfully');
    }

    public function delete($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully');
    }

    

}
