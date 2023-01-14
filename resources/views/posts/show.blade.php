@extends('layouts.app')
@section('content')
<p>{{ $post->title }}</p>
<p>{{ $post->auther }}</p>
<p>{{ $post->content }}</p>

<br>
<h3>Comment :</h3>

<ul>

    @foreach($post->comments as $comment)

    <li>{{$comment->comment}} <span><a href="{{route('comments.delete',$comment->id)}}" class="btn btn-danger" type="button" >Delete </a></span></li>
    @endforeach

</ul>
<a  href="{{route('posts.index')}}" class="btn btn-primary" type="button">back</a>
@endsection