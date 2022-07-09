@extends('layouts.application')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">

		<h4 class="panel-title"><i class="fa fa-search" style="font-size:32px;"></i>&nbsp;Meter Reading</h4>
	</div><br>
<div class="row db-heading-link">
	<div class="col-lg-12 margin-tb">
		@permission('meter_readings.index')
		<div class="pull-right">
			<a class="btn btn-warning btn-sm" href="{{ route('meter_readings.index') }}"> Back</a>
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
<div class="col-md-2"></div>
<div class="col-md-8">
<div class="alert alert-info status-box">
	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h5>Target for the month {{ date('m')}} / {{ date('Y')}} is {{ $target_date }}</h5>
</div>
</div>
<div class="col-md-2"></div>
</div>

<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="widget">
			<div class="widget-content">

				<!-- check if target is set -->
				@if($target_date !=0)
				{!! Form::open(array('route' => 'meter_readings.store','method'=>'POST')) !!}

				@include('system.meter_readings._form')
				<div class="form-group">
					<br>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
				{!! Form::close() !!}

				@else

				<div class="alert alert-danger status-box">
					<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h5>Please, Contact Administrator to set Target</h5>
				</div>
				@endif


			</div>
		</div>
	</div>
	<div class="col-md-3"></div>
</div>
</div>

@endsection