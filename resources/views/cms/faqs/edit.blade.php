@extends('cms.application')
@section('content')

<div class="content-panel">
	<div class="title">
		Faqs
	</div>
</div>

<div class="row collapse">
	
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Edit {{ $faq->name }}
			</div>

			<div class="content">
				{!! Form::model($faq, ['route' => ['cms.faqs.update', $faq->id], 'method' => 'PATCH']) !!}

				@include('cms.faqs._form', ['submitButton' => "Update"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@stop