@extends('cms.application')
@section('content')

<div class="content-panel">
	<div class="title">
		Programmes
	</div>
</div>

<div class="row collapse">
	
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Edit {{ $programmes->name }}
			</div>

			<div class="content">
				{!! Form::model($programmes, ['route' => ['cms.programmes.update', $programmes->id], 'method' => 'PATCH']) !!}

				@include('cms.programmes._form', ['submitButton' => "Update"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@stop