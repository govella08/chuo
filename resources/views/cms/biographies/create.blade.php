@extends('cms.application')
@section('content')

<div class="row collapse">
	<div class="large-7 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Biography
			</div>

			<div class="content">
				{!! Form::model('', ['route' => ['cms.biography.store'], 'files' => true, 'method' => 'POST']) !!}

				@include('cms.biographies._form', ['submitButton' => "Save"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@stop

