@extends('app')

@section('content')
	<h1>User Login</h1>
	<hr />

	
	{!! Form::open(array('url' => 'accounts/userLogin')) !!}
    

	    {!! Form::text('username') !!}
	    {!! Form::password('password') !!}
	    {!! Form::submit('Login') !!}
	{!! Form::close() !!}
	
	
@stop

@section('javascript')
    

@stop
