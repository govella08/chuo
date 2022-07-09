@permission('roles.index')
@extends('layouts.application')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="panel-title"><i class="fa fa-gears" style="font-size:32px;"></i>&nbsp;Role Management</h4>
	</div><br>
	<div class="row db-top-heading">
		<div class="col-lg-6"></div>
		<div class="col-lg-6">
			@permission('roles.create')
			<a class="btn btn-success btn-sm pull-right" href="{{ route('roles.create') }}"><i class="fa fa-plus-square"></i> Create New Role</a>
			@endpermission
		</div>
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
	<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
	<div class="table-responsive">
	<table class="table table-bordered table table-sorting table-hover table-dark-header table-bordered datatable  table-primary">
		<thead>
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Description</th>
				@if(Auth::user()->can(['roles.edit','roles.show','roles.delete_role']))
				<th width="280px">Action</th>
				@endif
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Description</th>
				@if(Auth::user()->can(['roles.edit','roles.show','roles.delete_role']))
				<th width="280px">Action</th>
				@endif
			</tr>
		</tfoot>
		@foreach ($roles as $key => $role)
		<tr>
			<td>{{ ++$i }}</td>
			<td>{{ $role->display_name }}</td>
			<td>{{ $role->description }}</td>
			@if(Auth::user()->can(['roles.edit','roles.show','roles.delete_role']))
			<td>

				<a class="left" href="{{ route('roles.show',Crypt::encrypt($role->id))}}" title="view"><i class="fa fa-eye left t_icon"></i></a>&nbsp;&nbsp;
				@permission('roles.edit')
				<a class="left" href="{{ route('roles.edit',Crypt::encrypt($role->id))}}" title="view"><i class="fa fa-pencil left t_icon"></i></a>&nbsp;&nbsp;
				@endpermission
				@permission('roles.delete_role') 
				@if($role->name !="super_admin" && $role->name !="admin" && $role->name !="general_dashboard_viewer")
				<a class="left" onclick="return confirm('Are you sure,you want to perform this Action?')" href="{{ route('roles.delete_role',$role->id)}}" title="delete"><i class="fa fa-trash left t_icon"></i></a>

				@endif
				@endpermission
			</td>
			@endif
		</tr>
		@endforeach
	</table>
	{!! $roles->render() !!}
</div>
</div>
	<div class="col-md-1"></div>
</div>
</div>
@endsection 
@endpermission