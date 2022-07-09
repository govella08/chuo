@extends('cms.application')
@section('content')

<div class="content-panel">
	<div class="title">
		Google Analytics
	</div>
</div>

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">
			<div class="content content-large">
				
				<ul class="accordion" data-accordion>
					@if($googleanalytics)
					{{ $googleanalytics->url }}&nbsp;&nbsp;<a href="{{ URL::route('cms.googleanalytics.edit', $googleanalytics->id) }}"><i class="ion-edit"></i>  EDIT</a></a>

					@endif
				</ul>


			</div> 
		</div>
		
	</div>

	@if(empty($googleanalytics))
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New Google Analytics Key
			</div>

			<div class="content">
				{!! Form::open(['route' => 'cms.googleanalytics.index']) !!}

				@include('cms.googleanalytics._form', ['submitButton' => "Save"])
				
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