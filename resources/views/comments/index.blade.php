@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-sm-6">
            <h1>All comments</h1>
        </div>
        <a href="{{route('comments.create')}}" class="btn btn-primary" type="button" >Create Comment
        </a>
        <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">comment</th>
                       
                </thead>
            <tbody>
                @foreach ($comments as $comment)
                <tr id="{{$comment->id}}"> 

                    <td>{{$comment->comment}}</td>
                    <td>    <a href="{{route('comments.show',$comment->id)}}" class="btn btn-primary" type="button" >Show </a>
                    </td>
                    <td>
                        <a href="{{route('comments.edit',$comment->id)}}" class="btn btn-success" type="button" >Edit </a>
                    </td>
                    <td>
                    <a href="{{route('comments.delete',$comment->id)}}" class="btn btn-danger" type="button" >Delete </a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection