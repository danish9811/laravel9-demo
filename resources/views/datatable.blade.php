@extends('layout.app')

@section('title', 'Metronic - the world\'s #1 selling Bootstrap Admin Theme Ecosystem for HTML, Vue, React, Angular &amp; Laravel by Keenthemes')
@section('page_name', 'Datatable')


<!-- jQuery datatable stylesheets -->
@section('stylesheets')
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endsection

<!-- main container starts -->
@section('main-container')

<table id="example" class="display" style="width:100%">

<!-- table heading -->
<thead>
	<tr>
		<th>id</th>
		<th>name</th>
		<th>position</th>
		<th>office</th>
		<th>age</th>
	</tr>
</thead>

<!-- table body -->
<tbody>
	@foreach ($users as $record)
		<tr>
			<td>{{ $record['id'] }}</td>
			<td>{{ $record['name'] }}</td>
			<td>{{ $record['position'] }}</td>
			<td>{{ $record['office'] }}</td>
			<td>{{ $record['age'] }}</td>
		</tr>
	@endforeach
</tbody>

<!-- table footer -->
<tfoot>
	<tr>
		<th>id</th>
		<th>name</th>
		<th>positon</th>
		<th>office</th>
		<th>age</th>
	</tr>
</tfoot>
</table>


{{-- 
<table id="example" class="display" style="width:100%">
	<thead>
	    <tr>
	        <th>Name</th>
	        <th>Position</th>
	        <th>Office</th>
	        <th>Age</th>
	        <th>Start date</th>
	        <th>Salary</th>
	    </tr>
	</thead>
	<tbody>
	    <tr>
	        <td>Donna Snider</td>
	        <td>Customer Support</td>
	        <td>New York</td>
	        <td>27</td>
	        <td>2011/01/25</td>
	        <td>$112,000</td>
	    </tr>
	</tbody>
	<tfoot>
	    <tr>
	        <th>Name</th>
	        <th>Position</th>
	        <th>Office</th>
	        <th>Age</th>
	        <th>Start date</th>
	        <th>Salary</th>
	    </tr>
	</tfoot>
	</table> 
	--}}

@endsection
<!-- main::container ends -->



<!-- scripts -->
@push('scripts')

<!-- these datatable scripts comes before the plugins -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
	$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endpush

