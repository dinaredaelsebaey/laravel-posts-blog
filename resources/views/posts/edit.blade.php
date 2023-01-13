@extends('layouts.app')
@section('title')
edit book {{$post->title}}
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
<form method="POST" action="{{route('posts.update',$post->id)}}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label class="form-label">Title</label>
      <input type="text" name="title" class="form-control" id="exampleInputEmail1" value="{{old('title') ?? $post->title}}">
    </div>
    <div class="mb-3">
      <label class="form-label">Auther</label>
      <input type="text" name="auther" class="form-control" id="exampleInputEmail1" value="{{old('auther') ?? $post->auther}}">
    </div>
    <div class="mb-3">
      <label  class="form-label">Content</label>
      <textarea name="content" class="form-control" id="exampleInputPassword1"> {{old('content') ?? $post->content}}</textarea>
    </div>

    <div class="mb-3">
      <label  class="form-label">Image</label>
      <input type="file" name="img" class="form-control" id="exampleInputEmail1" value="">
    </div>
    
    <button type="submit" class="btn btn-success">Update</button>
    
  </form>
</div>
@endsection