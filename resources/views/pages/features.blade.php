@extends('layouts.app')
@section('content')
    <h1>{{$title}}</h1>
    @if(count($features) > 0)
    <ul class="list-group">
        @foreach($features as $feat)
            <li class="list-group-item">{{$feat}}</li>
        @endforeach
    </ul>
    @endif
@endsection
