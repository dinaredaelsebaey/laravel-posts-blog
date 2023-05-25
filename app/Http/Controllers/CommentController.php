<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();    
        return view('comments.index',[
            'comments' => $comments
        ]);
    }

    // public function create()
    // {
    //     if(Auth::check())
    //     {
    //     return view('comments.create',[
    //     ]);
    // }
    // return redirect("login");
    // }
    public function create($id)
    {
        if(Auth::check()){
            $post =Post::FindOrFail($id);
            return view('comments.create',
            [
                'post' =>$post 
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
        $user_id=Auth::user()->id;
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

    //     public function store(Request $request)
    // {
    //     $request->validate([
    //         'comment'=>'required|string|min:5'
    //      ]);

         
    //     $post_id=$request->post_id;
    //     $user_id=Auth::user()->id;
    //     $comment=$request->comment;
         
    //      Comment::create([
    //         'post_id'=>$post_id,
    //         'user_id'=>$user_id,
    //         'comment'=>$comment,
    //      ]);
         
    //      return redirect()->route('comments.index');

    // }
    
    public function show($id)
    {
        $comment =Comment::findOrFail($id);
        return view('comments.show',[
            'comment' => $comment,
        ]);
    }
    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        return view('comments.edit', [
            'comment' => $comment
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'comment'=>'string|min:5'
         ]);
        $post_id=$request->post_id;
        //$user_id=Auth::id();
        $comment=$request->comment;
        Comment::findOrFail($id)->update([
            'comment'=>$comment,
         ]);
        return redirect()->route('posts.index',$id);

    }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'comment'=>'string|min:5',
    //      ]);
    //     $comment=$request->comment;
        
    //     //dd($comment);
    //     Comment::findOrFail($id)->update([
    //        'comment'=>$comment,
    //     ]);
    //     return redirect(route('comments.index',$id));
    // }
    
    public function delete($id) {
        $comment = Comment::findOrFail($id);
        $post_id = $comment->post_id;
        $comment->delete();
        return redirect()->route('posts.show',
        ['id' => $post_id]);
     }
}