@extends('cms.application')
@section('content')

<div class="content-panel">
    <div class="title">
       Departments
    </div>
</div>

<div class="row collapse">
	
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Edit {{ $department->deptName }}
			</div>

			<div class="content">
				{!! Form::model($department, ['route' => ['cms.department.update', $department->id], 'method' => 'PATCH']) !!}

					@include('department._form', ['submitButton' => "Update"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@stop