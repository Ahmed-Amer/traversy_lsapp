@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Posts Dashboard</div>

                <div class="card-body">
                    <a href="/posts/create" class="btn btn-primary btn-sm">Create Post</a>
                    <h5 style="margin: 20px 0; ">Your Blog Posts</h5>
                    <hr>
                    @if (count($posts) > 0)
                    <table class="table">
                        <thead class="table-secondary">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td>
                                    <a class="btn btn-outline-secondary" href="/posts/{{$post->id}}/edit">Edit</a>
                                </td>
                                <td>
                                    {!! Form::open(['action' => ['PostsController@destroy', $post->id] , 'method' =>
                                    'delete', 'class' => 'd-inline float-end']) !!}
                                    <div class="mb-3">
                                        {{Form::submit('Delete' , ['class' => 'btn btn-outline-danger'])}}
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p>No Posts</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Media Dashboard</div>

                <div class="card-body">
                    <a href="/media/upload" class="btn btn-primary btn-sm">Upload Media</a>
                    <h5 style="margin: 20px 0; ">Your Media</h5>
                    <hr>
                    @if (count($media) > 0)
                    <table class="table">
                        <thead class="table-secondary">
                            <tr>
                                <th scope="col">Media</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($media as $photo)
                            <tr>
                                <td>
                                    <img src="./photos/{{$photo->name}}" alt="{{$photo->name}}" class="img-thumbnail" style="width:60px;height:60px">
                                </td>

                                <td>
                                    <a class="btn btn-outline-secondary" href="/media/{{$photo->id}}">Show</a>
                                </td>

                                <td>
                                    {!! Form::open(['action' => ['MediaController@destroy', $photo->id] , 'method' =>
                                    'delete', 'class' => 'd-inline float-end']) !!}
                                    <div class="mb-3">
                                        {{Form::submit('Delete' , ['class' => 'btn btn-outline-danger'])}}
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p>No Posts</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection