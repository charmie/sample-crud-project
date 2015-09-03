 @extends('app')

@section('content')
	<h1>Create Users</h1>
	<hr />

	<div>
		{!! Form::open(array('url' => 'users/createUser')) !!}
		    <?php 
		    echo Form::label('username', 'Username');
		    echo Form::text('username',null,['class'=>'form-control']); 
		    echo "<br />";
		    echo Form::label('password', 'Password');
		    echo Form::password('password',['class'=>'form-control']); 
		    
		    echo "<br />";
			echo Form::submit('Click Me!');
		    ?>
		{!! Form::close() !!}
	</div>	

@stop

@section('javascript')
    <script>
	jQuery(document).ready(function(){
		
		//

    });
</script>
@stop
