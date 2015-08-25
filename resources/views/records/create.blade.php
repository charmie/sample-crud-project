@extends('app')
<style>
table, th, td {
    border: 1px solid black;
    margin-left: auto;
	margin-right: auto;
}


</style>
@section('content')
	<h1>Create new Record</h1>
	<hr />
	<div>
		{{ Form::open(['route' => 'records.process_add']) }}
    	<?php

    	echo Form::text('email', 'example@gmail.com');
    	echo Form::submit('Click Me!');
    	?>
		{{ Form::close() }}
	</div>

	
	</div>
	
@stop

@section('javascript')
    <script>
	jQuery(document).ready(function(){
		$('#articles').dataTable({});
	})
</script>
@stop
