
<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'>{!! $errors->first('title') !!}</span>
		{!! Form::label('title', 'Image Caption in in Swahili') !!}
		{!! Form::text('title') !!}
	</div>
</div>

<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'>{!! $errors->first('title_en') !!}</span>
		{!! Form::label('title_en', 'Image Caption in English') !!}
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


<div class="large-12 columns">
	<span class='form_error'>{!! $errors->first('mediaurl') !!}</span>
	{!! Form::label('mediaurl', 'Upload Photo (Preferred size [1125X400])') !!}
	{!! Form::file('mediaurl') !!}
</div>

	<div class="large-12 columns">
		{!! Form::label('status', 'Show Contents on Slider') !!}
		{!! Form::select('status', array('0'=>'Hide Contents on Slider','1' => 'Show Contents on Slider')) !!}
	</div>




<div class="row">
	<div class="large-12 small-12 medium-12 columns">
		{!! Form::submit($submitButton, ['class' => 'custom-button']) !!}
	</div>
</div>