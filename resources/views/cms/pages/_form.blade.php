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


<!-- <div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'>{!! $errors->first('summary_en') !!}</span>
		{!! Form::label('summary_en', 'English Summary') !!}
		{!! Form::textarea('summary_en') !!}
	</div>
</div>
<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'>{!! $errors->first('summary_sw') !!}</span>
		{!! Form::label('summary_sw', 'Swahili Summary') !!}
		{!! Form::textarea('summary_sw') !!}
	</div>
</div> -->

<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'>{!! $errors->first('content') !!}</span>
		{!! Form::label('content', 'Swahili Content') !!}
		{!! Form::textarea('content',null, ['id' => 'redactor_sw']) !!}
	</div>
</div>

<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'>{!! $errors->first('content_en') !!}</span>
		{!! Form::label('content_en', 'English Content') !!}
		{!! Form::textarea('content_en',null, ['id' => 'redactor_en']) !!}
	</div>
</div>

<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'>{!! $errors->first('page_category_id') !!}</span>
		{!! Form::label('page_category_id', 'Category') !!}
		{!! Form::select('page_category_id', $categories, null, array('class' => '')) !!}
	</div>
</div>


<div class="row collapse">
	<div class="large-12 small-12 medium-12 columns">
		{!! Form::submit($submitButton, ['class' => 'custom-button']) !!}
	</div>
</div>