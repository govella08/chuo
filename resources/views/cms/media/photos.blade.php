@extends('cms.application')
@section('content')

<div class="content-panel">
	<div class="title">
		Galleries
	</div>
</div>

<div class="row collapse">

	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">
			<div class="content content-large">
				
				<ul class="accordion" data-accordion>
					@foreach($galleries as $index => $gallery)
					<li class="accordion-navigation">
						<div>
							<div>
								<a href="{{ URL::route('cms.galleries.edit', $gallery->id) }}"><i class="ion-edit"></i>  EDIT</a> | <a href="{{ URL::route('cms.galleries.destroy', $gallery->id) }}" data-method='delete', data-confirm='Are you Sure?'><i class="ion-android-delete"></i>  DELETE</a>
							</div>
						</div>
						
					</li>
					@endforeach
				</ul>


			</div> 
		</div>
		
	</div>

	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New Gallery
			</div>

			<div class="content">
				{!! Form::open(['route' => 'cms.galleries.index']) !!}

				@include('cms.galleries._form', ['submitButton' => "Save"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>


@stop

@section('scripts')
<script type="text/javascript">
	$(document).ready(function(){
		$(document).foundation();
	});
</script>
@stop