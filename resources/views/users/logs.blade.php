@extends('app')

@section('content')
	<style>
	 	table, th, td{
	 		border: 1px solid black;
	 		padding:5px;
	 	}

	 	table{
	 		margin-left: auto;
	 		margin-right: auto;
	 	}
	</style>
	<h1>User Activities</h1>
	<hr />

	<table>
		<thead>
			<th>Executed on</th>
			<th>URL Execution</th>
			<th>Activity</th>
		</thead>
	@foreach ($logs as $log)
		
		<tr>
			<td>{{ $log->created_at }}</td>
			<td>{{ $log->current_url }}</td>
			<td>{{ $log->action }}</td>
		</tr>
		
	    
	@endforeach
	</table>
	
	
@stop

@section('javascript')
    <script>
	jQuery(document).ready(function(){
		


    });
</script>
@stop
