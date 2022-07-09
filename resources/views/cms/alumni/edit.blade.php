@extends('cms.application')
@section('content')

<div class="content-panel">
	<div class="title">
		Alumni
	</div>
</div>

<div class="row collapse">
	
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Edit {{ $alumnis->fullname }}
			</div>

			<div class="content">
				{!! Form::model($alumnis, ['route' => ['cms.alumni.update', $alumnis->id], 'files' => true, 'method' => 'PATCH']) !!}

				@include('cms.alumni._form', ['submitButton' => "Update"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@stop