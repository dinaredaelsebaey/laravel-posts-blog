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
        // $request->validate([
        //     'title'=>'string|unique:posts',
        //     'content'=>'string|min:20',
        //     'img'=>'required|image|mimes:JPG,jpg,png|max:2048'
        //  ]);

         
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
        //  return redirect(route('posts.show',[
        //     'id' => $post_id
        //  ]));
    }

    public function delete($id) {
        $comment = Comment::findOrFail($id);
        $post_id = $comment->post_id;
        $comment->delete();
        return redirect()->route('posts.show',['id' => $post_id]);
     }

    // public function edit($id)
    // {
    //     return view('posts.edit', [
    //         'post' => Post::findOrFail($id),
    //         //'users' => User::all(),
    //     ]);
    // }
    // public function update(Request $request, $id){
        
    //     $request->validate([
    //         'title'=>'string|unique:posts',
    //         'content'=>'string|min:20',
    //         'img'=>'nullable|image|mimes:JPG,jpg,png|max:2M'

    //      ]);

    //      //receive img object 
    //      $image=$request->file('img');
    //      //put extension
    //      $ext=$image->getClientOriginalExtension();
    //      //put name to img
    //      $name=uniqid() . ".$ext";
    //      //move img
    //      $image->move(public_path('uploads/imgs'),$name);
    //      $title=$request->title;
    //      $auther=$request->auther;
    //      $content=$request->content;
        
    //     Post::findOrFail($id)->update([
    //        'title'=>$title,
    //        'auther'=>$auther,
    //        'content'=>$content,
    //        'img'=>$name,
  
    //     ]);
    //     return redirect(route('posts.index',$id));
    //     }

    //     public function delete($id){
    //         Post::findOrFail($id)->delete();
    //         return redirect(route('posts.index'));
    //      }
}