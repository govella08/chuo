 @permission('users.index')
 @extends('layouts.application')
 @section('content')
 <div class="panel panel-default">
 	<div class="panel-heading">
 		<h4 class="panel-title"><i class="fa fa-group" style="font-size:32px;"></i>&nbsp;Users Management</h4>
 	</div><br>
 	<div class="row db-top-heading">
 		<div class="col-lg-6"></div>
 		@permission('users.create')
 		<div class="col-lg-6">
 			<a class="btn btn-success btn-sm pull-right" href="{{ route('users.create') }}"><i class="fa fa-plus-square"></i> Create New User</a>
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
 		<table class="table table-bordered table table-sorting table-hover table-bordered table-dark-header  datatable  table-primary" id="users">
 			<thead>
 				<tr>
 					<th>No</th>
 					<th>Created On</th>
 					<th>Fullname</th>
 					<th>Phone number</th>
 					<th>Email</th>
 					@if(Auth::user()->can(['users.update_user']))
 					<th>Activation</th>
 					@endif
 					<th>Region</th>
 					<th>Roles</th>
 					@if(Auth::user()->can(['users.show','users.edit','users.edit_role','users.delete_user']))
 					<th>Action</th> 
 					@endif
 				</tr>
 			</thead>
 			<tfoot>
 				<tr>
 					<th>No</th>
 					<th>Created On</th>
 					<th>Fullname</th>
 					<th>Phone number</th>
 					<th>Email</th>
 					@if(Auth::user()->can(['users.update_user']))
 					<th>Activation</th>
 					@endif
 					<th>Region</th>
 					<th>Roles</th>
 					@if(Auth::user()->can(['users.show','users.edit','users.edit_role','users.delete_user']))
 					<th>Action</th> 
 					@endif
 				</tr>
 			</tfoot>
 		</table>
 	</div>
 </div>
 <script type="text/javascript" language="javascript" class="init">
 
 $(document).ready(function() {
 	var table = $('#users').DataTable( {
 		"processing": true,
 		"serverSide": true,
 		"pageLength": 30,
 		"pagingType": "full_numbers",
 		"oLanguage": {
 			"sProcessing": "<center><img width='80px' height='auto' src='{{asset('cms_assets/images/spinner.gif')}}'></center>"
 		},
 		"ajax": "{{ route('users.index') }}",

 		columns: [
 		{data: 'rownum', name: 'rownum', orderable: false, searchable: false},
 		{data: 'created_at', name: 'users.created_at'},
 		{data: 'name', name: 'users.name'},
 		{data: 'phone', name: 'users.phone'},
 		{data: 'email', name: 'users.email'},
 		<?php if(Auth::user()->can(['users.update_user'])){ ?>
 			{data: 'status', name: 'users.activated'},
 			<?php } ?>
 			{data: 'region_name', name: 'users.region_id'},
 			{data: 'roles', name: 'users.roles', orderable: false, searchable: false},
 			<?php if(Auth::user()->can(['users.show','users.edit','users.edit_role','users.delete_user'])){ ?>
 				{data: 'options', name: 'options', orderable: false, searchable: false}
 				<?php } ?>

 				],
 				dom: 'lBfrtip',
 				lengthChange: true,

 				buttons: {

 					buttons: [ 

 					{ extend: 'copy', className: 'btn-warning', text: '<i class="fa fa-files-o"></i>', titleAttr: 'Copy', title: 'Users' },

 					{ extend: 'excel', className: 'btn-success', text: '<i class="fa fa-file-excel-o"></i>', titleAttr: 'Excel', title: 'Users' },

 					{ extend: 'pdfHtml5', orientation: 'landscape',
 					pageSize: 'LEGAL', className: 'btn-danger', text: '<i class="fa fa-file-pdf-o"></i>', titleAttr: 'PDF', title: 'Users' },

 					{ extend: 'print',orientation: 'landscape',
 					pageSize: 'LEGAL', className: 'btn-info', text: '<i class="fa fa-print"></i>', titleAttr: 'Print', titleAttr: 'Print', title: 'Users'},

 					{ extend: 'csvHtml5', className: 'btn-warning', text: 'CSV', titleAttr: 'CSV', title: 'Users'},

 					]
 				}



 			} );

} );

 </script>
 @endsection 
 @endpermission