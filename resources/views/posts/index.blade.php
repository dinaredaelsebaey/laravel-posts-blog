@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-sm-6">
            <h1>All Posts</h1>
        </div>
        <a href="{{route('posts.create')}}" class="btn btn-primary" type="button" >Create Post
        </a>
        <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Auther</th>
                        <th scope="col">Content</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr id="{{$post->id}}"> 
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{$post->auther}}</td>
                    <td>{{$post->content}}</td>
                    <td>    <a href="{{route('posts.show',$post->id)}}" class="btn btn-primary" type="button" >Show </a>
                    </td>
                    <td>
                        <a href="{{route('posts.edit',$post->id)}}" class="btn btn-success" type="button" >Edit </a>
                    </td>
                    <td>
                    <a href="{{route('posts.delete',$post->id)}}" class="btn btn-danger" type="button" >Delete </a>
                    </td>
                    <td>
                        <a href="{{route('comments.create',$post->id)}}" class="btn btn-secondary" type="button" >Comment </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection