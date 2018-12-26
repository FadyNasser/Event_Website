@extends('layouts.app')

@section('content')
    <a href="/reviews" class =" btn btn-default">Go Back</a>
    <h1>{{$review->title}}</h1>
    
    <div>
        {!!$review->description!!}
    </div>

    <hr>
    
    <small>Written on {{$review->created_at}} by {{$review->name}}</small>
    
    <hr>

    @if(!Auth::guest())

        @if (auth()->user()->Type !== 2)
            <a href="/reviews/{{$review->id}}/edit" class="btn btn-default">Edit</a>
        @endif
        @if (auth()->user()->Type == 3)
            {!!Form::open(['action' => ['PostsController@destroy',$review->id],'method' => 'Post','class' => 'pull-right'])!!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
    
@endsection