
<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'>{!! $errors->first('physical_address') !!}</span>
		{!! Form::label('physical_address', 'Physical Address In Swahili') !!}
		{!! Form::text('physical_address') !!}
	</div>
</div>

<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'>{!! $errors->first('physical_address_en') !!}</span>
		{!! Form::label('physical_address_en', 'Physical Address In English') !!}
		{!! Form::text('physical_address_en') !!}
	</div>
</div>

<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'>{!! $errors->first('phone') !!}</span>
		{!! Form::label('phone', 'Phone') !!}
		{!! Form::text('phone') !!}
	</div>
</div>

<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'>{!! $errors->first('fax') !!}</span>
		{!! Form::label('fax', 'Fax') !!}
		{!! Form::text('fax') !!}
	</div>
</div>
<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'>{!! $errors->first('hotline') !!}</span>
		{!! Form::label('hotline', 'Hotline') !!}
		{!! Form::text('hotline') !!}
	</div>
</div>

<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'>{!! $errors->first('email') !!}</span>
		{!! Form::label('email', 'email') !!}
		{!! Form::email('email') !!}
	</div>
</div>

<div class="row">
	<div class="large-12 small-12 medium-12 columns">
		{!! Form::submit($submitButton, ['class' => 'custom-button']) !!}
	</div>
</div>

