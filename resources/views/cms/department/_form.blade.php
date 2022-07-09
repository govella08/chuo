<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'>{!! $errors->first('dept_name') !!}</span>
		{!! Form::label('dept_name', 'Department in swahili') !!}
		{!! Form::text('dept_name') !!}
	</div>
</div>
<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'>{!! $errors->first('dept_name_en') !!}</span>
		{!! Form::label('dept_name_en', 'Department in English') !!}
		{!! Form::text('dept_name_en') !!}
	</div>
</div>

<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'>{!! $errors->first('content') !!}</span>
		{!! Form::label('content', 'Functions in Swahili') !!}
		{!! Form::textarea('content', null, ['id' => 'redactor_sw', 'class' => 'text-area-big']) !!}
	</div>
</div>
<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'>{!! $errors->first('content_en') !!}</span>
		{!! Form::label('content_en', 'Functions in English') !!}
		{!! Form::textarea('content_en', null, ['id' => 'redactor_en', 'class' => 'text-area-big']) !!}
	</div>
</div>
<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'>{!! $errors->first('active') !!}</span>
		{!! Form::label('active', 'Is Active') !!}
		{!! Form::select('active', ['1' => 'Yes', '0' => 'No']); !!}
	</div>
</div>


<div class="row">
	<div class="large-12 small-12 medium-12 columns">
		{!! Form::submit($submitButton, ['class' => 'custom-button']) !!}
	</div>
</div>