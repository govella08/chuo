@extends('layouts.application')
@permission('meter_replacement.index')
@section('content')
<div class="panel panel-default">
			<div class="panel-heading">

				<h4 class="panel-title"><i class="fa fa-wrench" style="font-size:32px;"></i>&nbsp;Meter Replacement</h4>
			</div><br>
<div class="row db-top-heading">
	<div class="col-md-6"></div>
	@permission('meter_replacement.create')
	<div class="col-md-6">
		<a class="btn btn-success btn-sm pull-right" href="{{ route('meter_replacement.create') }}"> <i class="fa fa-plus-square"></i> Water Meter Replacement</a>
	</div>
	@endpermission
</div>

@if(Session::has('message'))
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
<div class="alert alert-{{ Session::get('status') }} status-box">
	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	{{ Session::get('message') }}
</div>
</div>
<div class="col-md-2"></div>
</div>
@endif

<div class="table-responsive">
<table class="table table-bordered table table-sorting table-hover table-bordered table-dark-header  datatable  table-primary" id="meter_replacement">
	<thead>
		<tr>
			<th>S/N</th>
			<th>Date</th>
			<th>Achievements</th>
			<th>Request to CEO</th>
			<th>Region</th>
			@if(Auth::user()->can(['meter_replacement.edit','meter_replacement.delete_meter_replacement']))
			<th>Action</th>
			@endif
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th>S/N</th>
			<th>Date</th>
			<th>Achievements</th>
			<th>Request to CEO</th>
			<th>Region</th>
			@if(Auth::user()->can(['meter_replacement.edit','meter_replacement.delete_meter_replacement']))
			<th>Action</th>
			@endif
		</tr>
	</tfoot>
</table>
</div>

</div>
<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
	var table = $('#meter_replacement').DataTable( {
		"processing": true,
		"serverSide": true,
		"pageLength": 50,
		"pagingType": "full_numbers",
		"oLanguage": {
			"sProcessing": "<center><img width='80px' height='auto' src='{{asset('cms_assets/images/spinner.gif')}}'></center>"
		},
		"ajax": "{{ route('meter_replacement.index') }}",

		columns: [
		{data: 'rownum', name: 'rownum', orderable: false, searchable: false},
		{data: 'created_at', name: 'created_at'},
		/*{data: 'target', name: 'target'},*/
		{data: 'achievement', name: 'achievement'},
		{data: 'request_to_ceo', name: 'request_to_ceo'},
		{data: 'region_name', name: 'region_id'},
		<?php if(Auth::user()->can(['meter_replacement.edit','meter_replacement.delete_meter_replacement'])){ ?>
		{data: 'options', name: 'options', orderable: false, searchable: false}
		<?php } ?>

		],
		dom: 'lBfrtip',
		lengthChange: true,

		buttons: {

			buttons: [ 

			{ extend: 'copy', className: 'btn-warning', text: '<i class="fa fa-files-o"></i>', titleAttr: 'Copy', title: 'Meter Replacement' },

			{ extend: 'excel', className: 'btn-success', text: '<i class="fa fa-file-excel-o"></i>', titleAttr: 'Excel', title: 'Meter Replacement' },

			{ extend: 'pdfHtml5', orientation: 'landscape',
			pageSize: 'LEGAL', className: 'btn-danger', text: '<i class="fa fa-file-pdf-o"></i>', titleAttr: 'PDF', title: 'Meter Replacement' },

			{ extend: 'print',orientation: 'landscape',
			pageSize: 'LEGAL', className: 'btn-info', text: '<i class="fa fa-print"></i>', titleAttr: 'Print', titleAttr: 'Print', title: 'Meter Replacement'},

			{ extend: 'csvHtml5', className: 'btn-warning', text: 'CSV', titleAttr: 'CSV', title: 'Meter Replacement'},

			]
		}



	} );

} );

</script>
@endsection
@endpermission