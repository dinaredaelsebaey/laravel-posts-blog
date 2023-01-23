@extends('layouts.app')
@section('title')

@endsection

@section('content')

@if($errors->any())
<div class="alert alert-danger">
  @foreach($errors->all() as $error)
  <p>{{$error}}</p>
@endforeach
</div>
@endif
<div class="container">
<form method="POST" action="{{route('comments.update',$comment->id)}}" >
    @csrf
    <div class="mb-3">
      <label  class="form-label">Comment</label>
      <textarea name="content" class="form-control" id="exampleInputPassword1"> {{old('comment') ?? $comment->comment}}</textarea>
    </div>

    <button type="submit" class="btn btn-success">Update</button>
    
  </form>
</div>
@endsection