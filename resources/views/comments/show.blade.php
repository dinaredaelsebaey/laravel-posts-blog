@extends('layouts.app')
@section('content')

<br>
{{-- <h3>Comment : {{$comment->comment}}</h3> --}}

<a href="{{route('comments.create',$comment->id)}}" class="btn btn-primary" type="button" >Create </a>
<a  href="{{route('posts.index')}}" class="btn btn-primary" type="button">back</a>

@endsection