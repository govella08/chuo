@permission('regions.index')
@extends('layouts.application')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="panel-title"><i class="fa fa-navicon" style="font-size:32px;"></i>&nbsp;Regions Management</h4>
	</div><br>
	<div class="row db-top-heading">
		<div class="col-md-6"></div>
		@permission('regions.create')
		<div class="col-md-6">
			<a class="btn btn-success btn-sm pull-right" href="{{ route('regions.create') }}"> <i class="fa fa-plus-square"></i> Create New Region</a>
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
	<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
	<div class="table-responsive">
		<table class="table table-bordered table-dark-header table-dark-header  table-primary">
			<thead>
				<tr>
					<th>No</th>
					<th>Name</th>
					@if(Auth::user()->can(['regions.edit','regions.delete_region']))
					<th>Action</th>
					@endif
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>No</th>
					<th>Name</th>
					@if(Auth::user()->can(['regions.edit','regions.delete_region']))
					<th>Action</th>
					@endif
				</tr>
			</tfoot>
			@foreach ($data as  $region)
			<tr>
				<td>{{ ++$i }}</td>
				<td>{{ $region->region_name }}</td>
				@if(Auth::user()->can(['regions.edit','regions.delete_region']))

				<td>

					@permission('regions.edit')
					<a class="left" href="{{ route('regions.edit',Crypt::encrypt($region->id))}}" title="view"><i class="fa fa-pencil left t_icon"></i></a>&nbsp;&nbsp;
					@endpermission
					@permission('regions.delete_region')
					<a class="left" onclick="return confirm('Are you sure,you want to perform this Action?')"  href="{{ route('regions.delete_region',$region->id)}}" title="view" ><i class="fa fa-trash left t_icon"></i></a>
					@endpermission
				</td>
				@endif
			</tr>
			@endforeach
		</table>
		{!! $data->render() !!}
	</div>
	</div>
	<div class="col-md-1"></div>
</div>
</div>
@endsection
@endpermission