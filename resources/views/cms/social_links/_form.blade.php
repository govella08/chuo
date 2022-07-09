<div class="content">
    
  	<div class="row collapse">
		<div class="large-12 columns">
			<span class='form_error'>{!! $errors->first('title') !!}</span>
			{!! Form::label('title', 'Social link title') !!}
			{!! Form::select('title', $social_media, null, []) !!}
		</div>
	</div>

  </div>

	<div class="row collapse">
		<div class="large-12 columns">
			<span class='form_error'>{!! $errors->first('url') !!}</span>
			{!! Form::label('url', "Link/URL") !!}
			{!! Form::input('url', 'url', null, array('required' => 'required')) !!}
		</div>
	</div>

	<div class="row collapse">
		<div class="large-12 small-12 medium-12 columns">
			{!! Form::submit($submitButton, ['class' => 'custom-button']) !!}
		</div>
	</div>
</div>