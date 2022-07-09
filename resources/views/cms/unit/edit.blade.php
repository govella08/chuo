@extends('cms.application')
@section('content')

<div class="content-panel">
	<div class="title">
		Units
	</div>
</div>

<div class="row collapse">
	
	<div class="large-12 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Edit {{ $department->deptName }}
			</div>

			<div class="content">
				{!! Form::model($department, ['route' => ['cms.unit.update', $department->id], 'method' => 'PATCH']) !!}

				@include('cms.unit._form', ['submitButton' => "Update"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@stop