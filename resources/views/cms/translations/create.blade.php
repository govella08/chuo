@extends('cms.application')
@section('content')

<div class="row">
	<div class="large-12 medium-12 small-12 columns">
		<div class="page-title">
			<a href="{!! URL::to('translations')!!}"><i class="back-icon"></i></a> New Translation
		</div>
	</div>
</div>

<div class="row">
	<div class="large-9 medium-12 small-12 columns">

		
		{!! Form::open(array('route' => 'translations.store', 'enctype'=>'multipart/form-data')) !!}

		<div class="large-12 columns">
			<span class='form_error'>{!! $errors->first('keyword') !!}</span>
			{!! Form::label('keyword', 'Keyword') !!}
			{!! Form::text('keyword') !!}
		</div>

		<div class="large-12 columns">
			<span class='form_error'>{!! $errors->first('en') !!}</span>
			{!! Form::label('en', 'English title') !!}
			{!! Form::text('en') !!}
		</div>

		<div class="large-12 columns">
			<span class='form_error'>{!! $errors->first('sw') !!}</span>
			{!! Form::label('sw', 'Swahili title') !!}
			{!! Form::text('sw') !!}
		</div>






		<div class="large-12 columns">
			{!! Form::submit('Save', array('class' => 'custom-button')) !!}
		</div>
		
		{!! Form::close() !!}
	</div>

	<div class="large-9 medium-12 small-12 columns">
		
	</div>
</div>

@stop