@extends('cms.application')
@section('content')

<div class="content-panel">
	<div class="title">
		Administration (Management and Board)
	</div>
</div>

<div class="row collapse">
	
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Edit {{ $administration->title_en }}
			</div>

			<div class="content">
				{!! Form::model($administration, ['route' => ['cms.administration.update', $administration->id], 'files' => true, 'method' => 'PATCH']) !!}

				@include('cms.administration._form', ['submitButton' => "Update"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@stop