<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'>{!! $errors->first('url') !!}</span>
		{!! Form::label('url', 'Google Map URL') !!}
		{!! Form::text('url') !!}
	</div>
</div>


<div class="row">
	<div class="large-12 small-12 medium-12 columns">
		{!! Form::submit($submitButton, ['class' => 'custom-button']) !!}
	</div>
</div>