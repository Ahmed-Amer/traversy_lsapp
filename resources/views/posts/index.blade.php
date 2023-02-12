@extends('layouts.app')
@section('content')
<h1>Posts</h1>
@if(count($posts) > 0)
@foreach($posts as $post)
<div class="card">
    <div class="card-body">
        <a href="/posts/{{$post->id}}"><h5 class="card-title">{{$post->title}}</h5></a>
        <small>Created at : {{$post->created_at}} by {{$post->user->name}}</small>
    </div>
</div>
@endforeach

{!! $posts->links() !!}
@else
<p>No Posts</p>
@endif
@endsection