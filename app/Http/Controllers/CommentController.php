<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
class CommentController extends Controller
{
    public function index(Request $request)
    {
        $comments = Comment::all();    
        return view('comments.index',[
            'comments' => $comments
        ]);
     }
    public function create($id)
    {
        if(Auth::check())
        {
        $post=Post::findOrFail($id);
        return view('comments.create',[
            'post'=>$post
        ]);
    }
    return redirect("login");

    }


    public function store(Request $request)
    {
        $request->validate([
            'comment'=>'required|string|min:5'
         ]);

         
        $post_id=$request->post_id;
        $user_id=Auth::id();
        $comment=$request->comment;
         
         Comment::create([
            'post_id'=>$post_id,
            'user_id'=>$user_id,
            'comment'=>$comment,
         ]);
         
         return redirect()->route('posts.show',[
            'id' => $post_id
         ]);

    }

    public function delete($id) {
        $comment = Comment::findOrFail($id);
        $post_id = $comment->post_id;
        $comment->delete();
        return redirect()->route('posts.show',['id' => $post_id]);
     }

    
}