@extends('layouts.app')
@section('content')
<h1>Create Post</h1>

{!! Form::open(['action' => ['PostsController@update', $post->id] , 'method' => 'put']) !!}
   <div class="mb-3">
        {{Form::label('title', 'Title')}}
        {{Form::text('title' , $post->title , ['class' => 'form-control'])}}
   </div>
    <div class="mb-3">
        {{Form::label('body', 'Body')}}
        {{Form::textarea('body' , $post->body , ['class' => 'form-control' , 'rows' => '5'])}}
    </div>
    <div class="mb-3">
        {{Form::submit('Submit' , ['class' => 'btn btn-primary'])}}
    </div>
{!! Form::close() !!}

@endsection
