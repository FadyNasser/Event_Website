@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{!!$title!!}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <tr>
                        <td><a href="/posts/create" class = " btn btn-primary">Create an event</a></td>
                        <td><a href="/register" class = " btn btn-primary">Add a User</a></td>
                        <td>
                            <a class = "btn btn-primary" href="{{ route('logout') }}" 
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }} </a>
                        </td>
                    </tr>                    
                </div>
                @if(count($posts) > 0)

                <table class="table table-stripped">
                    <tr>
                        <th>Upcomming Events</th>
                        <th>Event Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->title}}</td>
                            <td>{{$post->date}}</td>
                            <td><a href="/posts/{{$post->id}}/edit" class ="btn btn-default">Edit</a></td>
                            <td>
                                {!!Form::open(['action' => ['PostsController@destroy',$post->id],'method' => 'Post','class' => 'pull-right'])!!}
                                {{Form::hidden('_method','DELETE')}}
                                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                                {!!Form::close()!!}
                            </td>
                        </tr>
                    @endforeach
                </table>

            @else
                <p>You Have No Upcomming Events<p>
            @endif

            @if(count($reviews) > 0)

            <table class="table table-stripped">
                <tr>
                    <th>Reviews</th>
                    <th>Rating</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach ($reviews as $review)
                    <tr>
                        <td>{{$review->title}}</td>
                        <td>{{$review->rating}}</td>
                        <td><a href="/reviews/{{$review->id}}/edit" class ="btn btn-default">Edit</a></td>
                        <td>
                            {!!Form::open(['action' => ['ReviewsController@destroy',$review->id],'method' => 'Post','class' => 'pull-right'])!!}
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                            {!!Form::close()!!}
                        </td>
                    </tr>
                @endforeach
            </table>

            @else
                <p>You Have No Reviews<p>
            @endif



            @if(count($applicants) > 0)

            <table class="table table-stripped">
                <tr>
                    <th>Applicants</th>
                    <th>Number</th>
                    <th>Email</th>
                    <th>Event</th>
                </tr>
                @foreach ($applicants as $applicant)
                    <tr>
                        <td>{{$applicant->name}}</td>
                        <td>{{$applicant->number}}</td>
                        <td>{{$applicant->email}}</td>
                        <td>{{$applicant->event}}</td>
                    </tr>
                @endforeach
            </table>

            @else
                <p>You Have No Applicants<p>
            @endif

            </div>
        </div>
    </div>
</div>
@endsection
