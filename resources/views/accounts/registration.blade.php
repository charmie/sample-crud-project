@extends('app')

@section('content')
    <h1>User Registration</h1>
    <hr />

    
    {!! Form::open(array('url' => 'accounts/registerAccount')) !!}
        {!! Form::label('username', 'Desired Username') !!}
        {!! Form::text('username') !!}
        <br />
        {!! Form::label('password', 'Desired Password') !!}
        {!! Form::password('password') !!}
        <br />
        {!! Form::submit('Register') !!}
    {!! Form::close() !!}
    
    
@stop

@section('javascript')
    

@stop
