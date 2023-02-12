@extends('layouts.app')
@section('content')
<h1>Media Preview</h1>
<a href="/media" class="btn btn-outline-secondary">Go Back</a>

@if(Auth::user())
    @if(Auth::user()->id == $photo->user->id)
        {!! Form::open(['action' => ['MediaController@destroy', $photo->id] , 'method' => 'delete', 'class' => 'd-inline float-end']) !!}
            <div class="mb-3">
                {{Form::submit('Delete' , ['class' => 'btn btn-outline-danger'])}}
            </div>
        {!! Form::close() !!}
    @endif
@endif
<hr>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <img src="/photos/{{$photo->name}}" alt="{{$photo->name}}" class="img-thumbnail" style="width:100%;height:100%">
    </div>
    <small>Created at : {{$photo->created_at}} by {{$photo->user->name}}</small>

</div>
@endsection