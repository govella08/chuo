<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'>{!! $errors->first('name') !!}</span>
		{!! Form::label('name', 'Role Name') !!}
		{!! Form::text('name') !!}
	</div>
</div>

<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'>{!! $errors->first('display_name') !!}</span>
		{!! Form::label('display_name', 'Display Name') !!}
		{!! Form::text('display_name') !!}
	</div>
</div>

<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'>{!! $errors->first('description') !!}</span>
		{!! Form::label('description', 'Description') !!}
		{!! Form::textarea('description') !!}
	</div>
</div>




<div class="row">
	<div class="large-12 small-12 medium-12 columns">
		{!! Form::submit($submitButton, ['class' => 'custom-button']) !!}
	</div>
</div>