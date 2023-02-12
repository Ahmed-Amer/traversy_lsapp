@extends('layouts.app')
@section('content')
<h1>Create Post</h1>

{!! Form::open(['action' => 'PostsController@store' , 'method' => 'post']) !!}
   <div class="mb-3">
        {{Form::label('title', 'Title')}}
        {{Form::text('title' , '' , ['class' => 'form-control'])}}
   </div>
    <div class="mb-3">
        {{Form::label('body', 'Body')}}
        {{Form::textarea('body' , '' , ['class' => 'form-control' , 'rows' => '5'])}}
    </div>
    <div class="mb-3">
        {{Form::submit('Submit' , ['class' => 'btn btn-primary'])}}
    </div>
{!! Form::close() !!}

@endsection
