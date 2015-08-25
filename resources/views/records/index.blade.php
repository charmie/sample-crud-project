@extends('app')
<style>
table, th, td {
    border: 1px solid black;
    margin-left: auto;
	margin-right: auto;
}


</style>
@section('content')
	<h1>Records</h1>
	<hr />

	<div>

		<button id="btn-add">Add</button>
		<button>Delete Selected</button>
		<button>Delete All</button>
	</div>
	<br /><br />
	<div>
		<table>
			<tr>
				<th></th>
				<th>Username</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
			</tr>
		
			@foreach($data as $record)
				<tr>
					<td><input type="checkbox" /></td>
					<td>{{ $record->username }}</td>
					<td>{{ $record->firstname }}</td>
					<td>{{ $record->lastname }}</td>
					<td>{{ $record->email }}</td>
				</tr>
			@endforeach
		</table>
	</div>

	<div>
	
	{{ Datatable::table()
    ->addColumn('id','Username')       // these are the column headings to be shown
    ->setUrl(route('api.users'))   // this is the route where data will be retrieved
    ->render() }}
	
@stop

@section('javascript')
    <script>
	jQuery(document).ready(function(){
		jQuery('#btn-add').click(function(){
			window.location = "records/add";
		});

	})
</script>
@stop
