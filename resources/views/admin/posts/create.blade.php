@extends('layouts.admin')
@section('content')

    <h1> Create Post </h1>

    <div style="padding-top: 40px;">

        {!! Form::open(['method' => 'POST' , 'action' => 'AdminPostsController@store' , 'files' => true]) !!}

        <div class="form-group row" style="padding-bottom: 20px">
            {!! Form::label('title' , 'Post Title') !!}
            {!! Form::text('title' , null , ['class' => 'form-control']) !!}
        </div>
        <div class="form-group row" style="padding-bottom: 20px">
            {!! Form::label('user_id' , 'Post User') !!}
            {!! Form::text('user_id' , null , ['class' => 'form-control']) !!}
        </div>
        <div class="form-group row" style="padding-bottom: 20px">
            {!! Form::label('body' , 'Post Content') !!}
            {!! Form::textarea('body' , null , ['class' => 'form-control' , 'rows'=> 3]) !!}
        </div>
        <div class="form-group row" style="padding-bottom: 20px">
            {!! Form::label('category_id' , 'Category') !!}
            {!! Form::select('category_id' , ['' =>'Choose Category'] + $categories ,null , ['class' => 'form-control']) !!}
        </div>
        <div class="form-group row " style="padding-bottom: 20px">
            {!! Form::label('photo_id' , 'Profile Image') !!}
            {!! Form::file('photo_id',['class'=>'form-control form-input']) !!}
        </div>


        {!! Form::submit('Create Post' , ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}

    </div>


    <div style="margin-top: 10px">
        @include('includes.errors')
    </div>




@stop
