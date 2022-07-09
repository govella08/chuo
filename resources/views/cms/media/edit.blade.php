@extends('cms.application')
@section('content')

<div class="content-panel">
	<div class="title">
		Media
	</div>
</div>

<div class="row collapse">
	
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Edit {{ $media->title_en }}
			</div>
			<div class="content">
				{!! Form::model($media, ['route' => ['cms.media.update', $media->id], 'method' => 'PATCH']) !!}

				@include('cms.media._form', ['submitButton' => "Update"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@stop