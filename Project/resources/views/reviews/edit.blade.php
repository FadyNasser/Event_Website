@extends('layouts.app')

@section('content')
    
    <h1>Edit Review</h1>

    {!! Form::open(['action'=>['ReviewsController@update',$review->id],'method'=>'POST']) !!}
        <div class = "form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title',$review->title,['class' => 'form-control','placeholder' => 'Title'])}}
        </div>

        <div class = "form-group">
                {{Form::label('name','Name')}}
                {{Form::text('name',$review->name,['class' => 'form-control','placeholder' => 'Enter your Name (Optional)'])}}
        </div>

        <div class = "form-group">
                {{Form::label('description','Description')}}
                {{Form::textarea('description',$review->description,['id'=> 'article-ckeditor','class' => 'form-control','placeholder' => 'Write your opinion'])}}
        </div>

        <div class="form-group ">
                {{Form::label('rating','Rating')}}
                {{Form::text('rating',$review->rating,['class' => 'form-control','placeholder' => 'Enter a number form 1 to 10 (10 for highest rating)'])}}
        </div>

        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class' => 'btn btn-primary'])}}

    {!! Form::close() !!}

@endsection