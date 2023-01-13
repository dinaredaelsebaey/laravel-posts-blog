<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view('posts.create');
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
            'title'=>'unique|string',
            'content'=>'string|min:20',
            'img'=>'image|max:2M|mimes:JPG,jpg,png'

         ]);

         //receive img object 
         $image=$request->file('img');
         //put extension
         $ext=$image->getClientOriginalExtension();
         //put name to img
         $name=uniqid() . ".$ext";
         //move img
         $image->move(public_path('uploads/imgs'),$name);
        $title=$request->title;
        $auther=$request->auther;
        $content=$request->content;
         
         Post::create([
            'title'=>$title,
            'auther'=>$auther,
            'content'=>$content,
            'img'=>$name,
            
         ]);
         return redirect(route('posts.create'));
    }

    public function edit($id)
    {
        return view('posts.edit', [
            'post' => Post::findOrFail($id),
            //'users' => User::all(),
        ]);
    }
    public function update(Request $request, $id){
        
        $title=$request->title;
        $auther=$request->auther;
        $content=$request->content;
        
        Post::findOrFail($id)->update([
           'title'=>$title,
           'auther'=>$auther,
           'content'=>$content,
  
        ]);
        return redirect(route('posts.index',$id));
        }

        public function delete($id){
            Post::findOrFail($id)->delete();
            return redirect(route('posts.index'));
         }
}