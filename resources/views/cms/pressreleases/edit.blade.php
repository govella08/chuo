@extends('cms.application')
@section('content')

<div class="content-panel">
	<div class="title">
		Press Relesases
	</div>
</div>

<div class="row collapse">
	
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Edit {{ $pressrelease->title_en }}
			</div>

			<div class="content">
				{!! Form::model($pressrelease, ['route' => ['cms.pressreleases.update', $pressrelease->id], 'files' => true, 'method' => 'PATCH']) !!}

				@include('cms.pressreleases._form', ['submitButton' => "Update"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@stop