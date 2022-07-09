<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'>{!! $errors->first('question') !!}</span>
		{!! Form::label('question', 'Question in swahili') !!}
		{!! Form::text('question') !!}
	</div>
</div>

<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'>{!! $errors->first('question_en') !!}</span>
		{!! Form::label('question_en', 'Question english') !!}
		{!! Form::text('question_en') !!}
	</div>
</div>

<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'>{!! $errors->first('answer') !!}</span>
		{!! Form::label('answer', 'Swahili answer') !!}
		{!! Form::textarea('answer', null, ['id' => 'redactor_sw', 'class' => 'text-area-big']) !!}
	</div>
</div>

<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'>{!! $errors->first('answer_en') !!}</span>
		{!! Form::label('answer_en', 'English answer') !!}
		{!! Form::textarea('answer_en', null, ['id' => 'redactor_en', 'class' => 'text-area-big']) !!}
	</div>
</div>

<div class="row collapse">
	<div class="large-12 columns">
		{!! Form::label('active', 'Status') !!}
		{!! Form::select('active', array('1' => 'Active','0'=>'Inactive')) !!}
	</div>
</div>

<div class="row">
	<div class="large-12 small-12 medium-12 columns">
		{!! Form::submit($submitButton, ['class' => 'custom-button']) !!}
	</div>
</div>