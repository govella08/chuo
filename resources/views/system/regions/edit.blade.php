@extends('layouts.application')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="panel-title"><i class="fa fa-navicon" style="font-size:32px;"></i>&nbsp;Regions Management</h4>
	</div><br>
<div class="row db-heading-link">
	<div class="col-lg-12 margin-tb">
		@permission('regions.index')
		<div class="pull-right">
			<a class="btn btn-warning btn-sm" href="{{ route('regions.index') }}"> Back</a>
		</div>
		@endpermission
	</div>
</div>
@if (count($errors) > 0)
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="alert alert-danger status-box">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
@endif

{!! Form::model($region, ['method' => 'PATCH','route' => ['regions.update', $region->id]]) !!}
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="widget">
			<div class="widget-content">
				<div class="form-group">
					<strong>Region Name:</strong>
					{!! Form::text('region_name', null, array('placeholder' => 'Region name','class' => 'form-control')) !!}
				</div>

				
				<div class="form-group">
					<br>
					<button type="submit" class="btn btn-success">Submit</button>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3"></div>
</div>
{!! Form::close() !!}
</div>
@endsection