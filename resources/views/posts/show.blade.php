@extends('layouts.app')
@section('content')
<p>title is {{ $post->title }}</p>
<p>auther is {{ $post->auther }}</p>
<p>content is {{ $post->content }}</p>

<br>
<h3>Comments : </h3>

<ul>
    @foreach($post->comments as $comment)
    <li>{{$comment->comment}}
        <a href="{{route('comments.edit',$comment->id)}}" class="btn btn-success" type="button" >Edit </a>
        <a href="{{route('comments.delete',$comment->id)}}" class="btn btn-danger" type="button" >Delete </a>
    </li> 

    @endforeach
   
</ul>
<a href="{{route('comments.create',$post->id)}}" class="btn btn-primary" type="button" >Comment </a>

<a  href="{{route('posts.index')}}" class="btn btn-primary" type="button">back</a>
@endsection