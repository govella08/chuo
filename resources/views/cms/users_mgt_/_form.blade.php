<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'>{!! $errors->first('name') !!}</span>
		{!! Form::label('name', 'Name') !!}
		{!! Form::text('name') !!}
	</div>
</div>

<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'>{!! $errors->first('email') !!}</span>
		{!! Form::label('email', 'Email') !!}
		{!! Form::text('email') !!}
	</div>
</div>

<div class="row">
	<div class="large-12 small-12 medium-12 columns">
		{!! Form::submit($submitButton, ['class' => 'custom-button']) !!}
	</div>
</div>