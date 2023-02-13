<?php

namespace App\Http\Controllers\Api;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CommentResource;
use Illuminate\Support\Facades\Auth;



class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        //return $comments; 
        return CommentResource::collection($comments);   
    }
    public function show($id)
    {
        $comment = Comment::findOrFail($id);
        // return
        //  [
        //     'comment' => $comment->comment,
        //     'post_id'=> $comment->post_id,
        //     'user_id'=>$comment->user_id,
        //  ];
       
        //when we use CommentResource for  one coloumn 
        return new CommentResource($comment);
        
        
    }
    public function store(Request $request)
    {
        $comment=$request->comment;
        $post_id=$request->post_id;
        $userid_=$request->userid_;
        
        $myComment=Comment::create([
        'comment'=>$comment,
        'post_id'=>$post_id,
        'userid_'=>$userid_,
        ]);
        
        // return
        //  [
        //     'comment' => $myComment->comment,
        //     'post_id'=> $myComment->post_id,
        //     'user_id'=>$myComment->user_id,
        //  ];

        return new CommentResource($myComment);
    }
}