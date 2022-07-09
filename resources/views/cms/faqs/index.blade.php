@extends('cms.application')
@section('content')

<div class="content-panel">
	<div class="title">
		Faqs
	</div>
</div>

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">
			<div class="content content-large">
				
				<ul class="accordion" data-accordion>
					@foreach($faqs as $index => $faq)
					<li class="accordion-navigation">
						<a href="#panel{{ $faq->id }}">{{ $index + 1 }}. {{ $faq->question_en }}</a>
						<div id="panel{{ $faq->id }}" class="content {{ $index == 0 ? 'active' : '' }}">
							{!! nl2br($faq->answer_en) !!}

							<div>
								<a href="{{ URL::route('cms.faqs.edit', $faq->id) }}"><i class="ion-edit"></i>  EDIT</a> | <a href="{{ URL::route('cms.faqs.destroy', $faq->id) }}" data-method='delete', data-confirm='Are you Sure?'><i class="ion-android-delete"></i>  DELETE</a>
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
				New company
			</div>

			<div class="content">
				{!! Form::open(['route' => 'cms.faqs.index']) !!}

				@include('cms.faqs._form', ['submitButton' => "Save"])
				
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