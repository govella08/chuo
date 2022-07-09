<div class="large-12 columns">
	<span class='form_error'>{!! $errors->first('title') !!}</span>
	{!! Form::label('title', 'Swahili title') !!}
	{!! Form::text('title') !!}
</div>

<div class="large-12 columns">
	<span class='form_error'>{!! $errors->first('title_en') !!}</span>
	{!! Form::label('title_en', 'English title') !!}
	{!! Form::text('title_en') !!}
</div>


<!-- <div class="large-12 columns">
	{!! Form::label('active', 'Active') !!}
	{!!Form::select('active', array('0'=>'In Active', '1'=>'Active'), 1, array('id' => 'internals'))!!}
</div> -->

<div class="large-12 columns">
	<span class='form_error'>{!! $errors->first('url') !!}</span><br />
	<span class="mini_desc">(Please select a type of link do you want to create?)</span><br />
	<span class='form_error'>{!! $errors->first('link') !!}</span>
	{!! Form::radio('link', 1, true, array('class' => 'int_link',"checked"=>"checked")) !!}
	{!! Form::label('link', 'Internal link') !!}

	{!! Form::radio('link', 0, false, array('class' => 'ext_link')) !!}
	{!! Form::label('link', 'External link') !!}
</div>

<div class="large-12 columns">
	
	{!! Form::url('url', null, array('class' => "external")) !!}
	{!! Form::select('url', $selectmenu, null, array('class' => 'internal'))!!}
	

</div>

{!! Form::hidden('menu_id') !!}
	<div class="large-8 columns">
			{!! Form::submit('Save', array('class' => 'tiny button')) !!}
	</div>


