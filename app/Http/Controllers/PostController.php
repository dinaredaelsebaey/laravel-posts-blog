<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::all();    
        return view('posts.index',[
            'posts' => $posts
        ]);
    }
    public function create()
    {
        if(Auth::check()){
            return view('posts.create');
        }
        return redirect("login");
    }
    public function show($id)
    {
        $post =Post::findOrFail($id);
        return view('posts.show',[
            'post' => $post,
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'string|unique:posts',
            'content'=>'string|min:20',
            'img'=>'nullable|image|mimes:JPG,jpg,png|max:2048'
         ]);
         //receive img object 
         $image=$request->file('img');
         $name = "";
         if($image){
            //put extension
            $ext=$image->getClientOriginalExtension();
            //put name to img
            $name=uniqid() . ".$ext";
            //move img
            $image->move(public_path('uploads/imgs'),$name);
         }
            $title=$request->title;
            $auther=$request->auther;
            $content=$request->content;
         
         Post::create([
            'title'=>$title,
            'auther'=>$auther,
            'content'=>$content,
            'img'=>$name,
            
         ]);
         return redirect(route('posts.index'));
    }

    public function edit($id)
    {
        $post=Post::findOrFail($id);
        return view('posts.edit', [
            'post' => $post
            //'users' => User::all(),
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'string',
            'content'=>'string|min:20',
            'img'=>'nullable|image|mimes:JPG,jpg,png|max:2M'
         ]);

         $image=$request->file('img');
         $name="";
         if($image){
         $ext=$image->getClientOriginalExtension();
         $name=uniqid() . ".$ext";
         $image->move(public_path('uploads/imgs'),$name);
         }

         $title=$request->title;
         $auther=$request->auther;
         $content=$request->content;
        
        Post::findOrFail($id)->update([
           'title'=>$title,
           'auther'=>$auther,
           'content'=>$content,
           'img'=>$name,
  
        ]);
        return redirect(route('posts.index',$id));
    }

    public function delete($id)
    {
            Post::findOrFail($id)->delete();
            return redirect(route('posts.index'));
    }
}