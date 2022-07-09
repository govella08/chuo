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


<div class="large-12 columns">
	<span class='form_error'>{!! $errors->first('content') !!}</span>
	{!! Form::label('content', 'Swahili Description') !!}
	{!! Form::textarea('content') !!}
</div>

<div class="large-12 columns">
	<span class='form_error'>{!! $errors->first('content_en') !!}</span>
	{!! Form::label('content_en', 'English Content') !!}
	{!! Form::textarea('content_en') !!}
</div>


<div class="large-12 columns">
	{!! Form::hidden('featured',0) !!}
	{!! Form::label('featured', ' To Be Used as a slider') !!}
	{!! Form::checkbox('featured') !!}
</div>

<!-- <div class="large-12 columns">
	<span class='form_error'>{!! $errors->first('category') !!}</span>
	{!! Form::label('category', 'Category') !!}
	{!! Form::select('category', array('' => 'Select Category Type','0'=>'Others','1'=>'State Visits'), null, array('class' => '')) !!}
</div>
 -->
<div class="large-12 columns">
	<span class='form_error'>{!! $errors->first('type') !!}</span>
	{!! Form::label('type', 'Category') !!}
	{!! Form::select('type', array('' => 'Select Gallery Type','photos'=>'Photos','videos'=>'Videos'), null, array('class' => '')) !!}
</div>

<div class="row">
	<div class="large-12 small-12 medium-12 columns">
		{!! Form::submit($submitButton, ['class' => 'custom-button']) !!}
	</div>
</div>