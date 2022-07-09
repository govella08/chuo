@extends('cms.application')
@section('content')

<div class="content-panel">
	<div class="title">
		Edt  Google Analytic's URL
	</div>
</div>

<div class="row collapse">
	
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Edit {{ $googleanalytics->url }}
			</div>

			<div class="content">
				{!! Form::model($googleanalytics, ['route' => ['cms.googleanalytics.update', $googleanalytics->id], 'method' => 'PATCH']) !!}

				@include('cms.googleanalytics._form', ['submitButton' => "Update"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@stop