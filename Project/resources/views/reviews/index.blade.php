@extends('layouts.app')

@section('content')
        <h1>Reviews</h1>

        @if(count($reviews) > 0)
                @foreach($reviews as $review)
                        <div class = "list-group">
                                <h1><a href ="/reviews/{{$review->id}}"> Title :- {{$review->title}}</a></h1>
                                <div> Description :- {!!$review->description!!} </div>
                                <h4> rating :- {!!$review->rating!!} </h4>
                                <small>Written on {{$review->created_at}} by {{$review->name}}</small>
                                <hr>
                        </div>
                @endforeach
                {{$reviews->links()}}
        @else
                <p>No Reviews Found</p>
        @endif
        <div><a href="/reviews/create" class = " btn btn-primary">Add a Review</a></div>

@endsection