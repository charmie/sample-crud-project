@extends('app')

@section('content')
	
	<hr />
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="jumbotron">
					<h1>User Login</h1>
					<p>
						{!! Form::open(array('url' => 'accounts/userLogin')) !!}
							{!! Form::label('username', 'Username') !!}
						    {!! Form::text('username',null,array('class'=>'form-control')) !!}
						    {!! Form::label('password', 'Password') !!}
						    {!! Form::password('password', array('class'=>'form-control')) !!}
						    <br /><br />
						    <div style="text-align:right;">
						    {!! Form::submit('Login',array('class'=>'btn btn-primary btn-large')) !!}
						    </div>
						{!! Form::close() !!}
					</p>
					<br /><br /><br />
				
					<div style="text-align:right;">
						Don't have an account yet?<br />
						<button id="btn-register" class="btn btn-primary btn-large">Register</button>
					</div>	
					

				</div>

			</div>

		</div>
	</div>
	
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
