<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'>{!! $errors->first('title') !!}</span>
		{!! Form::label('title', 'Category title in  swahili') !!}
		{!! Form::text('title') !!}
	</div>
</div>

<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'>{!! $errors->first('title_en') !!}</span>
		{!! Form::label('title_en', 'Category title in in english ') !!}
		{!! Form::text('title_en') !!}
	</div>
</div>

<div class="large-12 columns">
	<span class='form_error'>{!! $errors->first('has_label') !!}</span><br />
	{!! Form::label('', 'Should have Group label') !!}
	{!! Form::radio('has_label', 1, array('class' => 'has_label',"checked"=>"checked")) !!}
	{!! Form::label('has_label', 'Yes') !!}

	{!! Form::radio('has_label', 0, array('class' => 'has_label')) !!}
	{!! Form::label('has_label', 'No') !!}
</div>

<div class="row collapse">
	<div class="large-12 small-12 medium-12 columns">
		{!! Form::submit($submitButton, ['class' => 'custom-button']) !!}
	</div>
</div>