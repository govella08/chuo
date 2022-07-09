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
				Edit {{ $speech->title_en }}
			</div>

			<div class="content">
				{!! Form::model($speech, ['route' => ['cms.speeches.update', $speech->id], 'files' => true, 'method' => 'PATCH']) !!}

				@include('cms.speeches._form', ['submitButton' => "Update"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@stop