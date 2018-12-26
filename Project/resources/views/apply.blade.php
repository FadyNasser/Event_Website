@extends('layouts.app')

@section('content')
        <div class = "jumbotron text-center">
            <h1>Apply now </h1>
        </div>
        
        @guest
        {!! Form::open(['action'=>'ApplicantsController@store','method'=>'POST']) !!}
        <div class = "form-group">
            {{Form::label('name','Name')}}
            {{Form::text('name','',['class' => 'form-control','placeholder' => 'Enter Your Name'])}}
        </div>

        <div class = "form-group">
            {{Form::label('email','Email')}}
            {{Form::text('email','',['class' => 'form-control','placeholder' => 'Enter Your Email'])}}
        </div>

        <div class = "form-group">
            {{Form::label('number','Phone Number')}}
            {{Form::text('number','',['class' => 'form-control','placeholder' => 'Enter Your Phone Number'])}}
        </div>

        <div class = "form-group">
            {{Form::label('event','Event Number')}}
            {{Form::text('event','',['class' => 'form-control','placeholder' => 'Enter Event ID'])}}
        </div>

        {{Form::submit('Apply Now',['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
    @endguest
@endsection
