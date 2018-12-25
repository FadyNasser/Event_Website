@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <tr>
                        <td><a href="/posts/create" class = " btn btn-primary">Create an event</a></td>
                        @if ($Type == 3)
                            <td><a href="/register" class = " btn btn-primary">Add a User</a></td>
                        @endif
                        <td><a class = "btn btn-primary" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a></td>
                    </tr>                    
                </div>
                @if(count($posts) > 0)

                <table class="table table-stripped">
                    <tr>
                        <th>Your Blog Posts</th>
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
                <p>You Have No Posts<p>
            @endif
            </div>
        </div>
    </div>
</div>
@endsection