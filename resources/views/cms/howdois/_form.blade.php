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

<div class="row collapse">
	<div class="large-12 columns">
		{!! Form::label('content', 'Content in Swahili') !!}
		{!! Form::textarea('content', null, ['id' => 'redactor_sw', 'class' => 'text-area-big']) !!}
	</div>
</div>

<div class="row collapse">
	<div class="large-12 columns">
		{!! Form::label('content_en', 'Content in english') !!}
		{!! Form::textarea('content_en', null, ['id' => 'redactor_en', 'class' => 'text-area-big']) !!}
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