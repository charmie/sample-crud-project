@extends('app')

@section('content')
	<h1>All users</h1>
	<hr />
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="btn-group btn-group-sm">
					 
					<button id="addRow" class="btn btn-primary" type="button">
						<em class="glyphicon glyphicon-plus"></em> Add
					</button> 
					<button id="btn-show-acts" class="btn btn-primary" type="button">
						<em class="glyphicon glyphicon-time"></em> Show Activities
					</button> 
					<button id="btn-logout" class="btn btn-primary" type="button">
						<em class="glyphicon glyphicon-repeat"></em> Logout
					</button> 
					
				</div>
			</div>
			<br /><br /><br />
			<div id="dt-table" class="col-md-12">
				{!! Datatable::table()
			    ->addColumn('id','usernames','actions')       
			    ->setUrl(route('api.users'))   
			    ->render() !!}
			</div>
		</div>
	</div>
	
@stop

@section('javascript')
    <script>
	jQuery(document).ready(function(){
		jQuery('#addRow').click(function(){
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
