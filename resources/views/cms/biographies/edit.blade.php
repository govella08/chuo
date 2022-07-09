@extends('cms.application')
@section('content')

<div class="row collapse">
<div class="large-7 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Biography
			</div>

			<div class="content">
				{!! Form::model($biography, ['route' => ['cms.biography.update', $biography->id], 'files' => true, 'method' => 'PATCH']) !!}

					@include('cms.biographies._form', ['submitButton' => "Save"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@stop

