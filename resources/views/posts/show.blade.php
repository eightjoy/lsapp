@extends('layouts/app')

@section('content')
    <br>
    <a href="/posts" class="btn btn-primary">GO BACC</a>
    <h1>{{$post->title}}</h1>
    <img style="width:100%" src="/storage/cover_image/{{$post->cover_image}}">
    <br>
    <div>
        {!!$post->body!!}
    </div>
    <hr>
    <small>writen on {{$post->created_at}} by {{$post->user->name}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>

            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection