@extends('layouts.app')
@section('content')
<h1>Media</h1>
<hr>
@if(count($media) > 0)
<div class="row">
    @foreach($media as $photo)
    <div class="col-md-4 col-sm-6" style="max-height: 350px !important;">
        <a href="/media/{{$photo->id}}">
            <img src="/photos/{{$photo->name}}" alt="{{$photo->name}}" class="img-thumbnail" style="width:100%;height:100%">
        </a>
    </div>
    @endforeach
</div>

{!! $media->links() !!}
@else
<p>No Media</p>
@endif
@endsection