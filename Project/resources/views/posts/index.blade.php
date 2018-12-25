@extends('layouts.app')

@section('content')
        <h1>Posts</h1>

        @if(count($posts) > 0)
                @foreach($posts as $post)
                        <div class = "list-group">
                                <h1><a href ="/posts/{{$post->id}}"> Title :- {{$post->title}}</a></h1>
                                <h4> Date :- {!!$post->date!!} </h4>
                                <div> Description :- {!!$post->body!!} </div>
                                {{-- <small>Written on {{$post->created_at}} by {{$post->user->name}}</small> --}}
                                <hr>
                        </div>
                @endforeach
                {{$posts->links()}}
        @else
                <p>No Posts Found</p>
        @endif

@endsection