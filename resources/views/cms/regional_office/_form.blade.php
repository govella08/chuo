
<div class="content">
	<div class="row collapse">
		<div class="large-12 columns">
			<span class='form_error'>{!! $errors->first('name') !!}</span>
			{!! Form::label('name', 'Region Name') !!}
			{!! Form::text('name') !!}
		</div>
	</div>

	<div class="row collapse">
		<div class="large-6 columns">
			<span class='form_error'>{!! $errors->first('latitude') !!}</span>
			{!! Form::label('latitude', 'HQ Latitude') !!}
			{!! Form::text('latitude') !!}
		</div>
		<div class="large-6 columns">
			<span class='form_error'>{!! $errors->first('longitude') !!}</span>
			{!! Form::label('longitude', 'HQ Longtude') !!}
			{!! Form::text('longitude') !!}
		</div>
	</div>
    <ul class="tabs" data-tab id="myTabs">
      <li class="tab-title active"><a href="#panel1">Swahili</a></li>
      <li class="tab-title"><a href="#panel2">English</a></li>
    </ul>

    <div class="tabs-content">

    @if($errors->count())
	    <span class='form_error'>{!! $errors->first('name') !!}</span> <br />
		<span class='form_error'>{!! $errors->first('physical_address_en') !!}</span> <br />
		<span class='form_error'>{!! $errors->first('physical_address') !!}</span> <br />
		
    @endif
    

      <div class="content active" id="panel1">
      	<div class="row collapse">
			<div class="large-12 columns">
				<span class='form_error'>{!! $errors->first('physical_address') !!}</span>
				{!! Form::label('physical_address', 'Anwani ya ofisi kwa Kiswahili') !!}
				{!! Form::textarea('physical_address', null, ['class' => 'text-area-small']) !!}
			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('content', 'Maelezo kwa Swahili') !!}
				{!! Form::textarea('content', null, ['id' => 'redactor_sw', 'class' => 'text-area-big']) !!}
			</div>
		</div>

		

      </div>

      <div class="content" id="panel2">
        <div class="row collapse">
			<div class="large-12 columns">
				<span class='form_error'>{!! $errors->first('physical_address_en') !!}</span>
				{!! Form::label('physical_address_en', 'Physical Address in English') !!}
				{!! Form::textarea('physical_address_en', null, ['class' => 'text-area-small']) !!}
			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('content_en', 'Description in english') !!}
				{!! Form::textarea('content_en', null, ['id' => 'redactor_en', 'class' => 'text-area-big']) !!}
			</div>
		</div>


      </div>

		<div class="row collapse">
			<div class="large-12 columns">
				<span class='form_error'>{!! $errors->first('phone') !!}</span>
				{!! Form::label('phone', 'Phone Number') !!}
				{!! Form::text('phone') !!}
			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('fax', 'Fax') !!}
				{!! Form::text('fax') !!}
			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('email', 'Email Address') !!}
				{!! Form::text('email') !!}
			</div>
		</div>


		<div class="row collapse">
			<div class="large-12 small-12 medium-12 columns">
				{!! Form::submit($submitButton, ['class' => 'custom-button']) !!}
			</div>
		</div>

    </div>

</div>
