<div class="content">

    <ul class="tabs" data-tab id="myTabs">
      <li class="tab-title active"><a href="#panel1">Swahili</a></li>
      <li class="tab-title"><a href="#panel2">English</a></li>
    </ul>

    <div class="tabs-content">

    @if($errors->count())
	    <span class='form_error'>{!! $errors->first('title') !!}</span> <br />
	    <span class='form_error'>{!! $errors->first('description') !!}</span> <br />
	    <span class='form_error'>{!! $errors->first('fee') !!}</span> <br />
	    <span class='form_error'>{!! $errors->first('start_time') !!}</span> <br />
	    <span class='form_error'>{!! $errors->first('end_time') !!}</span> <br />
	    <span class='form_error'>{!! $errors->first('start_date') !!}</span> <br />
	    <span class='form_error'>{!! $errors->first('end_date') !!}</span> <br />
	    <span class='form_error'>{!! $errors->first('location') !!}</span> 
	    <span class='form_error'>{!! $errors->first('participants') !!}</span> 
	    <span class='form_error'>{!! $errors->first('objectives') !!}</span> 
    @endif
    

      <div class="content active" id="panel1">
      	<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('title', 'Title in Swahili') !!}
				{!! Form::text('title') !!}
			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('description', 'Content in Swahili') !!}
				{!! Form::textarea('description', null, ['id' => 'redactor_sw', 'class' => 'text-area-big']) !!}
			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('location', 'Event Location in swahili') !!}
				{!! Form::text('location') !!}
			</div>
		</div>
		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('participants', 'Participants In Swahili') !!}
				{!! Form::textarea('participants', null, ['id' => 'redactor_sw', 'class' => 'text-area-big']) !!}
			</div>
		</div>
		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('objectives', 'Objectives in Swahili') !!}
				{!! Form::textarea('objectives', null, ['id' => 'redactor_sw', 'class' => 'text-area-big']) !!}
			</div>
		</div>

      </div>

      <div class="content" id="panel2">
         <div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('title_en', 'Title in english') !!}
				{!! Form::text('title_en') !!}
			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('description_en', 'Content in english') !!}
				{!! Form::textarea('description_en', null, ['id' => 'redactor_en', 'class' => 'text-area-big']) !!}
			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('location_en', 'Event Location in English') !!}
				{!! Form::text('location_en') !!}
			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('participants_en', 'Participants in English') !!}
				{!! Form::textarea('participants_en', null, ['id' => 'redactor_sw', 'class' => 'text-area-big']) !!}
			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('objectives_en', 'Objectives In English') !!}
				{!! Form::textarea('objectives_en', null, ['id' => 'redactor_en', 'class' => 'text-area-big']) !!}
			</div>
		</div>

      </div>

        

        <div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('start_time', 'Event Start Time') !!}
				{!! Form::input('time','start_time') !!}
			</div>
		</div>
		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('end_time', 'Event End Time') !!}
				{!! Form::input('time','end_time') !!}
			</div>
		</div>

   
        <div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('fee', 'Event Fee') !!}
				{!! Form::text('fee', null, ['id' => 'redactor']) !!}
			</div>
		</div>

		<div class="row collapse">
			<div class="large-6 columns">
				{!! Form::label('start_date', 'Event Start Date') !!}
				{!! Form::input('date', 'start_date') !!}
			</div>

			<div class="large-6 columns">
				{!! Form::label('end_date', 'Event End Date') !!}
				{!! Form::input('date', 'end_date') !!}
			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('flier', 'Events Flier') !!}
				{!! Form::file('flier') !!}
			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('infophone', 'Phone Number') !!}
				{!! Form::text('infophone') !!}
			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('infoemail', 'Email') !!}
				{!! Form::text('infoemail') !!}
			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('visible', 'Status') !!}
				{!! Form::select('visible', array('1' => 'Active','0'=>'Inactive')) !!}
			</div>
		</div>


		<div class="row collapse">
			<div class="large-12 small-12 medium-12 columns">
				{!! Form::submit($submitButton, ['class' => 'custom-button']) !!}
			</div>
		</div>

    </div>

</div>

