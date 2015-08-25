@extends('app')

@section('content')
	<h1>All users</h1>
	<hr />

	<button id="addRow">ADD</button>
	<br /><br />

	<div id="dt-table">
			{!! Datatable::table()
	    ->addColumn('id','usernames','actions')       
	    ->setUrl(route('api.users'))   
	    ->render() !!}

	</div>
	
	
	
@stop

@section('javascript')
    <script>
	jQuery(document).ready(function(){
		jQuery('#addRow').click(function(){
			window.location = 'users/create';
		});


    });
</script>
@stop
