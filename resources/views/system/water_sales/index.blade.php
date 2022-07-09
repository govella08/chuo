@extends('layouts.application')
@permission('water_sales.index')
@section('content')
<div class="panel panel-default">
			<div class="panel-heading">

				<h4 class="panel-title"><i class="fa fa-tint" style="font-size:32px;"></i>&nbsp;Water Sales</h4>
			</div><br>
<div class="row db-top-heading">
	<div class="col-md-6"></div>
	@permission('water_sales.create')
	<div class="col-md-6">
		<a class="btn btn-success btn-sm pull-right" href="{{ route('water_sales.create') }}"> <i class="fa fa-plus-square"></i> Create Water Sales</a>
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
	<table class="table table-bordered table table-sorting table-hover table-bordered table-dark-header  datatable  table-primary" id="water_sales">
		 <thead>
		<tr>
			<th>S/N</th>
			<th>Date of Submission</th>
			<th>Achievement</th>
			<th>Region</th>
			@if(Auth::user()->can(['water_sales.edit','water_sales.delete_water_sales']))
			<th>Action</th>
			@endif
		</tr>
		 </thead>
		 <tfoot>
		<tr>
			<th>S/N</th>
			<th>Date of Submission</th>
			<th>Achievement</th>
			<th>Region</th>
			@if(Auth::user()->can(['water_sales.edit','water_sales.delete_water_sales']))
			<th>Action</th>
			@endif
		</tr>
		 </tfoot>
	</table>
</div>
</div>

<script type="text/javascript" language="javascript" class="init">
 
$(document).ready(function() {
  var table = $('#water_sales').DataTable( {
    "processing": true,
    "serverSide": true,
     "pageLength": 50,
     "pagingType": "full_numbers",
     "oLanguage": {
        "sProcessing": "<center><img width='80px' height='auto' src='{{asset('cms_assets/images/spinner.gif')}}'></center>"
    },
    "ajax": "{{ route('water_sales.index') }}",

     columns: [
	          	{data: 'rownum', name: 'rownum', orderable: false, searchable: false},
                {data: 'created_at', name: 'created_at'},
                {data: 'achievement', name: 'achievement'},
              	{data: 'region_name', name: 'region_id'},
              	<?php if(Auth::user()->can(['water_sales.edit','water_sales.delete_water_sales'])){ ?>
	          	{data: 'options', name: 'options', orderable: false, searchable: false}
	          	<?php } ?>

            ],
			dom: 'lBfrtip',
			lengthChange: true,

			buttons: {

				buttons: [ 

				{ extend: 'copy', className: 'btn-warning', text: '<i class="fa fa-files-o"></i>', titleAttr: 'Copy', title: 'Water Sales  Targets' },

				{ extend: 'excel', className: 'btn-success', text: '<i class="fa fa-file-excel-o"></i>', titleAttr: 'Excel', title: 'Water Sales  Targets' },

				{ extend: 'pdfHtml5', orientation: 'landscape',
				pageSize: 'LEGAL', className: 'btn-danger', text: '<i class="fa fa-file-pdf-o"></i>', titleAttr: 'PDF', title: 'Water Sales  Targets' },

				{ extend: 'print',orientation: 'landscape',
				pageSize: 'LEGAL', className: 'btn-info', text: '<i class="fa fa-print"></i>', titleAttr: 'Print', titleAttr: 'Print', title: 'Water Sales  Targets'},

				{ extend: 'csvHtml5', className: 'btn-warning', text: 'CSV', titleAttr: 'CSV', title: 'Water Sales Targets'},

				]
			}



  } );

} );

  </script>
@endsection
@endpermission