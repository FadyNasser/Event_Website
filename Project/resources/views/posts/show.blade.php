@extends('layouts.app')

@section('content')
    <a href="/posts" class =" btn btn-default">Go Back</a>
    <h1> Event Title :- {{$post->title}}</h1>
    <h2> Event ID :- {{$post->id}}</h2>
    
    <div>
        {!!$post->body!!}
    </div>

    <hr>
    
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    
    <hr>

    @guest
        <div><a href="/apply" class = " btn btn-primary">Apply Now</a></div>
    @endguest

    @if(!Auth::guest())

        @if (auth()->user()->Type != 1)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
        @endif
        @if (auth()->user()->Type == 3)    
            {!!Form::open(['action' => ['PostsController@destroy',$post->id],'method' => 'Post','class' => 'pull-right'])!!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
    
@endsection