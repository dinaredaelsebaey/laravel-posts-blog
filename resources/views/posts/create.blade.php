@extends('layouts.app')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



<form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="container">
    <div class="mb-3">
      <label class="form-label">Title</label>
      <input type="text" name="title" class="form-control" id="exampleInputEmail1" value="{{old('title')}}">
      
      <label class="form-label">Auther</label>
      <input type="text" name="auther" class="form-control" id="exampleInputEmail1" value="{{old('auther')}}">
      
    <div class="mb-3">
      <label  class="form-label">Content</label>
      <textarea name="content" class="form-control" id="exampleInputPassword1">{{old('content')}}</textarea>
    </div>

    <div class="mb-3">
      <label  class="form-label">Image</label>
      <input type="file" name="img" class="form-control" id="exampleInputEmail1" value="">
    </div>
    
    <button type="submit" class="btn btn-primary">Store</button>
  </form>
</div>

  @endsection