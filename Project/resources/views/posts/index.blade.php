@extends('layouts.app')

@section('content')
        <h1>{!!$title!!}</h1>

        @if(count($posts) > 0)
                @foreach($posts as $post)
                        <div class = "list-group">
                                <li>
                                <h1><a href ="/posts/{{$post->id}}"> Title :- {{$post->title}}</a></h1>
                                <h2> Event ID :- {{$post->id}}</h2>
                                <h4> Date :- {!!$post->date!!} </h4>
                                <div> Description :- {!!$post->body!!} </div>
                                {{-- <small>Written on {{$post->created_at}} by {{$post->user->name}}</small> --}}
                                </li>
                                <hr>
                        </div>
                @endforeach
                {{$posts->links()}}
        @else
                <p>No Posts Found</p>
        @endif

        @guest
        @else
                <div><a href="/posts/create" class = " btn btn-primary">Add an event</a></div>
        @endguest

@endsection