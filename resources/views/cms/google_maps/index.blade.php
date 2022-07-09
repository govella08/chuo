@extends('cms.application')
@section('content')

<div class="content-panel">
    <div class="title">
       Google Map
    </div>
</div>

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">
		    <div class="content content-large">
			   
				<ul class="accordion" data-accordion>
					@if(count($google_maps))
					   {{ $google_maps->url }}&nbsp;&nbsp;<a href="{{ URL::route('cms.googlemaps.edit', $google_maps->id) }}"><i class="ion-edit"></i>  EDIT</a></a>

					  @endif
				</ul>


		    </div> 
		</div>
		
	</div>

@if(empty($google_maps))
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New Google Maps URL
			</div>

			<div class="content">
				{!! Form::open(['route' => 'cms.googlemaps.index']) !!}

					@include('google_maps._form', ['submitButton' => "Save"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
	@endif
</div>


@stop

@section('scripts')
	<script type="text/javascript">
		$(document).ready(function(){
		    $(document).foundation();
		});
	</script>
@stop