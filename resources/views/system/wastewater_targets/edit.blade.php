@extends('layouts.application')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="panel-title"><i class="fa fa-cube" style="font-size:32px;"></i>&nbsp;Waste Water Targets</h4>
	</div><br>
<div class="row db-heading-link">
	<div class="col-lg-12 margin-tb">
		@permission('wastewater_targets.index')
		<div class="pull-right">
			<a class="btn btn-warning btn-sm" href="{{ route('wastewater_targets.index') }}"> Back</a>
		</div>
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
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="widget">
			<div class="widget-content">
				{!! Form::model($wastewater_targets, ['method' => 'PATCH','route' => ['wastewater_targets.update', $wastewater_targets->id]]) !!}
				@include('system.wastewater_targets._form')
				<div class="form-group">
					<br>
					<button type="submit" class="btn btn-success">Submit</button>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
	<div class="col-md-3"></div>
</div>
</div>
@endsection