<div class="content content-large">

	

	<div class="row collapse">

		<div class="large-12 columns">
			<span class='form_error'>{!! $errors->first('content') !!}</span>
			{!! Form::label('content', 'Swahili content') !!}
			{!! Form::textarea('content', null, ['id' => 'redactor_en', 'class' => 'text-area-big']) !!}
		</div>

		<div class="large-12 columns">
			<span class='form_error'>{!! $errors->first('content_en') !!}</span>
			{!! Form::label('content_en', 'English content') !!}
			{!! Form::textarea('content_en', null, ['id' => 'redactor_en', 'class' => 'text-area-big']) !!}
		</div>

	</div>

	<div class="row collapse">
		<div class="large-16 small-12 medium-12 columns">
			{!! Form::submit($submitButton, ['class' => 'custom-button']) !!}
		</div>
	</div>

</div>