@extends('layouts.application')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">

		<h4 class="panel-title"><i class="fa fa-map-marker" style="font-size:32px;"></i>&nbsp;Water Production</h4>
	</div><br>
<div class="row db-heading-link">
	<div class="col-lg-12 margin-tb">
		@permission('water_productions.index')
		<div class="pull-right">
			<a class="btn btn-warning btn-sm" href="{{ route('water_productions.index') }}"> Back</a>
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

<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="widget">
			<div class="widget-content">
				{!! Form::model($water_productions, ['method' => 'PATCH','route' => ['water_productions.update', $water_productions->id]]) !!}
				@include('system.water_productions._form')
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