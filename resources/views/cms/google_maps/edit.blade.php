@extends('cms.application')
@section('content')

<div class="content-panel">
    <div class="title">
         Edt  Google Map's URL
    </div>
</div>

<div class="row collapse">
	
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Edit {{ $google_maps->url }}
			</div>

			<div class="content">
				{!! Form::model($google_maps, ['route' => ['cms.googlemaps.update', $google_maps->id], 'method' => 'PATCH']) !!}

					@include('google_maps._form', ['submitButton' => "Update"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@stop