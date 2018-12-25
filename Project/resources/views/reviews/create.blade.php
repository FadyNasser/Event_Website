@extends('layouts.app')

@section('content')
    
    <h1>Add Review</h1>

    {!! Form::open(['action'=>'ReviewsController@store','method'=>'POST']) !!}
        <div class = "form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title','',['class' => 'form-control','placeholder' => 'Title'])}}
        </div>

        <div class = "form-group">
                {{Form::label('name','Name')}}
                {{Form::text('name','',['class' => 'form-control','placeholder' => 'Enter your Name (Optional)'])}}
        </div>

        <div class = "form-group">
                {{Form::label('description','Description')}}
                {{Form::textarea('description','',['id'=> 'article-ckeditor','class' => 'form-control','placeholder' => 'Write your opinion'])}}
        </div>

        <div class="form-group ">
                {{Form::label('rating','Rating')}}
                {{Form::text('rating','',['class' => 'form-control','placeholder' => 'Enter a number form 1 to 5 (5 for highest rating)'])}}
        </div>
        {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}




@endsection