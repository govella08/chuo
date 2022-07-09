@extends('cms.application')
@section('content')

<div class="content-panel">
	<div class="title">
		Speeches
	</div>
</div>

<div class="row collapse">
	
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Edit {{ $highlight->title_en }}
			</div>

			<div class="content">
				{!! Form::model($highlight, ['route' => ['cms.highlights.update', $highlight->id], 'files' => true, 'method' => 'PATCH']) !!}

				@include('cms.highlights._form', ['submitButton' => "Update"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@stop