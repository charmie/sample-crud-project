@extends('app')

@section('content')
	<h1>All users</h1>
	<hr />

	<button id="addRow">ADD</button>
	<button id="btn-show-acts">SHOW YOUR ACTIVITIES</button>
	<button id="btn-logout">LOGOUT</button>
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
			//window.location = 'users/create';
			window.location = '/users/create';
		});

		jQuery('#btn-show-acts').click(function(){
			window.location = '/users/logs';
		});

		jQuery('#btn-logout').click(function(){
			window.location = '/accounts/logout';
		});


    });
</script>
@stop
