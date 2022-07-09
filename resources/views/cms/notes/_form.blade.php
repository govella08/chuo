<p><span class='form_error'></span></p>


<div class="large-12 columns">
	<span class='form_error'>{!! $errors->first('salutation') !!}</span>
	{!! Form::label('salutation', 'Swahili Salutation') !!}
	{!! Form::text('salutation') !!}
</div>
<div class="large-12 columns">
	<span class='form_error'>{!! $errors->first('salutation_en') !!}</span>
	{!! Form::label('salutation_en', 'English Salutation') !!}
	{!! Form::text('salutation_en') !!}
</div>



<div class="large-12 columns">
	<span class='form_error'>{!! $errors->first('name') !!}</span>
	{!! Form::label('name', 'Full Name') !!}
	{!! Form::text('name') !!}
</div>


<div class="large-12 columns">
	<span class='form_error'>{!! $errors->first('title') !!}</span>
	{!! Form::label('title', 'Swahili title') !!}
	{!! Form::text('title') !!}
</div>

<div class="large-12 columns">
	<span class='form_error'>{!! $errors->first('title_en') !!}</span>
	{!! Form::label('title_en', 'English title') !!}
	{!! Form::text('title_en') !!}
</div>


<div class="large-12 columns">
	<span class='form_error'>{!! $errors->first('content') !!}</span>
	{!! Form::label('content', 'Swahili Content') !!}
	{!! Form::textarea('content',null, ['id' => 'redactor_sw']) !!}
</div>

<div class="large-12 columns">
	<span class='form_error'>{!! $errors->first('content_en') !!}</span>
	{!! Form::label('content_en', 'English Content') !!}
	{!! Form::textarea('content_en',null, ['id' => 'redactor_en']) !!}
</div>


<div class="row">
	<div class="large-12 small-12 medium-12 columns">
		{!! Form::submit($submitButton, ['class' => 'custom-button']) !!}
	</div>
</div>

