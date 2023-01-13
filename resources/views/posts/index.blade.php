@extends('layouts.app')
@section('content')

@foreach ($posts as $post)

<br>
    post title is : {{$post->title}}
    <a href="#" class="btn btn-secondary" type="button" >Comment 
    </a>
    <a href="{{route('posts.show',$post->id)}}" class="btn btn-primary" type="button" >Show 
    </a>

    <a href="{{route('posts.edit',$post->id)}}" class="btn btn-success" type="button" >Edit 
    </a>

    <a href="{{route('posts.delete',$post->id)}}" class="btn btn-danger" type="button" >Delete 
    </a>
    <br>
    
    <p>post Auther is : {{$post->auther}} </p>
    <p>post content is : {{$post->content}} </p>
    <hr>


@endforeach





<div class="container">
    <h1>hello from all posts</h1>
    <a href="{{route('posts.create')}}" class="btn btn-primary" type="button" >Create Post
    </a>
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td colspan="2">Larry the Bird</td>
        <td>@twitter</td>
      </tr>
    </tbody>
  </table>
</div>

@endsection