@extends('layouts.app')
@section('content')

<br>
<h3>Comment : {{$comment->comment}}</h3>

<a  href="{{route('comments.index')}}" class="btn btn-primary" type="button">back</a>

@endsection