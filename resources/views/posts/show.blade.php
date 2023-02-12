@extends('layouts.app')
@section('content')
<h1>{{$post->title}}</h1>
<p class="fs-4">{{$post->body}}</p>
<hr>
<small>Created at : {{$post->created_at}} by {{$post->user->name}}</small>
<hr>
@if(Auth::user())
    @if(Auth::user()->id == $post->user->id)
        <a class="btn btn-outline-secondary" href="/posts/{{$post->id}}/edit">Edit</a>
        {!! Form::open(['action' => ['PostsController@destroy', $post->id] , 'method' => 'delete', 'class' => 'd-inline
        float-end']) !!}
        <div class="mb-3">
            {{Form::submit('Delete' , ['class' => 'btn btn-outline-danger'])}}
        </div>
        {!! Form::close() !!}
    @endif    
@endif
@endsection