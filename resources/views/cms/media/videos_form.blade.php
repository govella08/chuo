{!! Form::hidden('gallery_id') !!}

<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'>{!! $errors->first('title') !!}</span>
		{!! Form::label('title', 'Title in swahili') !!}
		{!! Form::text('title') !!}
	</div>
</div>

<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'>{!! $errors->first('title_en') !!}</span>
		{!! Form::label('title_en', 'Title english') !!}
		{!! Form::text('title_en') !!}
	</div>
</div>

<div class="large-12 columns">
	<span class='form_error'>{!! $errors->first('content') !!}</span>
	{!! Form::label('content', 'Swahili Summary') !!}
	{!! Form::textarea('content') !!}
</div>

<div class="large-12 columns">
	<span class='form_error'>{!! $errors->first('content_en') !!}</span>
	{!! Form::label('content_en', 'English Summary') !!}
	{!! Form::textarea('content_en') !!}
</div>


<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'>{!! $errors->first('url') !!}</span>
		{!! Form::label('url', 'Youtube Video') !!}
		{!! Form::text('url') !!}
	</div>
</div>




<div class="row">
	<div class="large-12 small-12 medium-12 columns">
		{!! Form::submit($submitButton, ['class' => 'custom-button']) !!}
	</div>
</div>