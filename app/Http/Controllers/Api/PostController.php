<?php

namespace App\Http\Controllers\Api;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function index()
    {
        //PostResource is class we made it from composer to transform data and reuse it
        //PostResource we emplement it with data which we need
        //when reuse it for more than one coloumn 
        $posts = Post::all();
        //return $posts; 
        return PostResource::collection($posts);   
    }
    public function show($id)
    {
        $post = Post::findOrFail($id);
        // return
        //  [
        //     'title' => $post->title,
        //     'auther' => $post->auther,
        //     'content' => $post->content,
            
        //  ];
       
        //when we use PostResource for  one coloumn 
        return new PostResource($post);
        
        
    }
    public function store(Request $request)
    {
        $title=$request->title;
        $auther=$request->auther;
        $content=$request->content;
        
        $myPost=Post::create([
        'title'=>$title,
        'auther'=>$auther,
        'content'=>$content,
        ]);
        
        //return
        //[
        //  'title' => $myPost->title,
        //  'auther' => $myPost->auther,
        //  'content' => $myPost->content,
            
        //];

        return new PostResource($myPost);
    }

    // public function edit($id)
    // {
    //     $post=Post::findOrFail($id);
    //     return [
    //         'title' => $post->title,
    //     ];
    // }
}