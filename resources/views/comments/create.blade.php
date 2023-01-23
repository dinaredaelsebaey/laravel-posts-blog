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



<form method="POST" action="{{route('comments.store',['post_id'=>$post->id])}}" enctype="multipart/form-data">
    @csrf
    <div class="container">
    <div class="mb-3">
      


        {{-- route('comments.show', $post->id) == route('comments.show', ['id' => $post->id]); --}}

      
    <div class="mb-3">
      <label  class="form-label">Comment</label>
      <textarea name="comment" class="form-control" id="exampleInputPassword1">{{old('comment')}}</textarea>
    </div>


    <button type="submit" class="btn btn-primary">post</button>
  </form>
</div>

  @endsection