@extends('app')

@section('content')
	<h1>User Login</h1>
	<hr />
	{!! Form::open(array('url' => 'accounts/userLogin')) !!}
	    {!! Form::text('username') !!}
	    {!! Form::password('password') !!}
	    {!! Form::submit('Login') !!}
	{!! Form::close() !!}

	<br /><br />
	<button id="btn-register">Register</button>
@stop

@section('javascript')
<script>
	jQuery(document).ready(function(){
		jQuery('#btn-register').click(function(){
			window.location = 'accounts/registration';
		});	
	})
</script>
@stop
