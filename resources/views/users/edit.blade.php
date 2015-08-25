@extends('app')

@section('content')
	<h1>Edit Users</h1>
	<hr />

	<div>
		{!! Form::model($users, array('route'=>array('users.update',$users->id),'method'=>'PUT')) !!}
		    {!! Form::text('username') !!}
		    {!! Form::submit('Update User') !!}
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
