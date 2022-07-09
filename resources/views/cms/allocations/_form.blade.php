<div class="content">

    <ul class="tabs" data-tab id="myTabs">
      <li class="tab-title active"><a href="#panel1">Swahili</a></li>
      <li class="tab-title"><a href="#panel2">English</a></li>
    </ul>

    <div class="tabs-content">

    @if($errors->count())
	    <span class='form_error'>{!! $errors->first('description') !!}</span> <br />
	    <span class='form_error'>{!! $errors->first('fee') !!}</span> <br />
    @endif
    

      <div class="content active" id="panel1">

		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('description', 'Content in Swahili') !!}
				{!! Form::textarea('description', null, ['id' => 'redactor_sw', 'class' => 'text-area-big']) !!}
			</div>
		</div>

      </div>

      <div class="content" id="panel2">

		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('description_en', 'Content in english') !!}
				{!! Form::textarea('description_en', null, ['id' => 'redactor_en', 'class' => 'text-area-big']) !!}
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
				{!! Form::label('flier', 'Events Flier') !!}
				{!! Form::file('flier') !!}
			</div>
		</div>


		<div class="row collapse">
			<div class="large-12 small-12 medium-12 columns">
				{!! Form::submit($submitButton, ['class' => 'custom-button']) !!}
			</div>
		</div>

    </div>

</div>

