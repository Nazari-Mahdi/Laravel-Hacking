@extends('layouts.admin')
@section('content')

    <h1> Create User </h1>

    <div style="padding-top: 40px;">

        {!! Form::open(['method'=>'POST' , 'action' =>'AdminUsersController@store' , 'enctype' => 'multipart/form-data']) !!}

        <div class="form-group row" style="padding-bottom: 20px">
            {!! Form::label('name' , 'User Name') !!}
            {!! Form::text('name' , null , ['class'=>'form-control form-input']) !!}
        </div>

        <div class="form-group row " style="padding-bottom: 20px">
            {!! Form::label('email' , 'Email Address') !!}
            {!! Form::email('email' , null , ['class'=>'form-control form-input']) !!}
        </div>

        <div class="form-group row " style="padding-bottom: 20px">
            {!! Form::label('role_id' , 'Role') !!}
            {!! Form::select('role_id',['' => 'Choose Role'] + $roles , null , ['class'=>'form-control form-input']) !!}
        </div>

        <div class="form-group row " style="padding-bottom: 20px">
            {!! Form::label('is_active' , 'Status') !!}
            {!! Form::select('is_active', array(1 => 'Active' , 0 =>'Not Active ') , null , ['class'=>'form-control form-input']) !!}
        </div>

        <div class="form-group row " style="padding-bottom: 20px">
            {!! Form::label('password' , 'Password') !!}
            {!! Form::password('password',['class'=>'form-control form-input']) !!}
        </div>

        <div class="form-group row " style="padding-bottom: 20px">
            {!! Form::label('photo_id' , 'Profile Image') !!}
            {!! Form::file('photo_id',['class'=>'form-control form-input']) !!}
        </div>

        {!! Form::submit('Create Post' , ['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}

    </div>

    <div style="margin-top: 10px">
        @include('includes.errors')
    </div>

@stop
