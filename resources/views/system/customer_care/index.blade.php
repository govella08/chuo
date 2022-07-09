@extends('layouts.application')
@permission('customer_care.index')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">

		<h4 class="panel-title"><i class="fa fa-phone-square" style="font-size:32px;"></i>&nbsp;Customer Service</h4>
	</div><br>
	<div class="row db-top-heading">
		<div class="col-md-6"></div>
		@permission('customer_care.create')
		<div class="col-md-6">
			<a class="btn btn-success btn-sm pull-right" href="{{ route('customer_care.create') }}"> <i class="fa fa-plus-square"></i> Create Customer Service</a>
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
		<table class="table table-bordered table table-sorting table-hover table-bordered table-dark-header  datatable table-primary" id="customer">
			<thead>
				<tr>
					<th>S/N</th>
					<th>Date of Submission</th>
					<th>Issues From Call Centre</th>
					<th>Issues in Region</th>
					<th>Total Issues</th>
					<th>Resolved Issues</th>
					<th>Pending Issues</th>
					<th>Region</th>
					@if(Auth::user()->can(['customer_care.edit','customer_care.delete_customer_care']))
					<th>Action</th>
					@endif
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>S/N</th>
					<th>Date of Submission</th>
					<th>Issues From Call Centre</th>
					<th>Issues in Region</th>
					<th>Total Issues</th>
					<th>Resolved Issues</th>
					<th>Pending Issues</th>
					<th>Region</th>
					@if(Auth::user()->can(['customer_care.edit','customer_care.delete_customer_care']))
					<th>Action</th>
					@endif
				</tr>
			</tfoot>
		</table>
	</div>
</div>


<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
	var table = $('#customer').DataTable( {
		"processing": true,
		"serverSide": true,
		"pageLength": 50,
		"pagingType": "full_numbers",
		"oLanguage": {
			"sProcessing": "<center><img width='80px' height='auto' src='{{asset('cms_assets/images/spinner.gif')}}'></center>"
		},
		"ajax": "{{ route('customer_care.index') }}",

		columns: [
		{data: 'rownum', name: 'rownum', orderable: false, searchable: false},
		{data: 'created_at', name: 'created_at'},
		{data: 'issues_call_center', name: 'issues_call_center'},
		{data: 'issues_regions', name: 'issues_regions'},
		{data: 'total', name: 'total'},
		{data: 'resolved', name: 'resolved'},
		{data: 'pending', name: 'pending'},
		{data: 'region_name', name: 'region_id'},
		<?php if(Auth::user()->can(['customer_care.edit','customer_care.delete_customer_care'])){ ?>
		{data: 'options', name: 'options', orderable: false, searchable: false}
		<?php } ?>

		],
		dom: 'lBfrtip',
		lengthChange: true,

		buttons: {

			buttons: [ 

			{ extend: 'copy', className: 'btn-warning', text: '<i class="fa fa-files-o"></i>', titleAttr: 'Copy', title: 'Cusrtomer Care Report' },

			{ extend: 'excel', className: 'btn-success', text: '<i class="fa fa-file-excel-o"></i>', titleAttr: 'Excel', title: 'Cusrtomer Care Report' },

			{ extend: 'pdfHtml5', orientation: 'landscape',
			pageSize: 'LEGAL', className: 'btn-danger', text: '<i class="fa fa-file-pdf-o"></i>', titleAttr: 'PDF', title: 'Cusrtomer Care Report' },

			{ extend: 'print',orientation: 'landscape',
			pageSize: 'LEGAL', className: 'btn-info', text: '<i class="fa fa-print"></i>', titleAttr: 'Print', titleAttr: 'Print', title: 'Cusrtomer Care Report'},

			{ extend: 'csvHtml5', className: 'btn-warning', text: 'CSV', titleAttr: 'CSV', title: 'Cusrtomer Care Report'},

			]
		}



	} );

} );

</script>
@endsection
@endpermission