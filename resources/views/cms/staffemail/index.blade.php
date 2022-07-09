@extends('cms.application')
@section('content')

<div class="content-panel">
	<div class="title">
		Staff Email
	</div>
</div>

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">
			<div class="content content-large">
				
				<ul class="accordion" data-accordion>
					@if($staffemail)
					{{ $staffemail->url }}&nbsp;&nbsp;<a href="{{ URL::route('cms.staffemail.edit', $staffemail->id) }}"><i class="ion-edit"></i>  EDIT</a></a>

					@endif
				</ul>


			</div> 
		</div>
		
	</div>

	@if(empty($staffemail))
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New Staff Email URL
			</div>

			<div class="content">
				{!! Form::open(['route' => 'cms.staffemail.index']) !!}

				@include('cms.staffemail._form', ['submitButton' => "Save"])
				
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