<div class="content">

    <ul class="tabs" data-tab id="myTabs">
      <li class="tab-title active"><a href="#panel1">Swahili</a></li>
      <li class="tab-title"><a href="#panel2">English</a></li>
    </ul>

    <div class="tabs-content">

	    @if($errors->count())
		    <span class='form_error'>{!! $errors->first('name_en') !!}</span> <br />
		    <span class='form_error'>{!! $errors->first('description_en') !!}</span> <br />
			<span class='form_error'>{!! $errors->first('level_id') !!}</span> 
	    @endif
	    
		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('level_id', 'Select Programme level') !!}
				{!! Form::select('level_id',$levels,null,[]) !!}
			</div>
		</div>

	    <div class="content active" id="panel1">
			<div class="row collapse">
				<div class="large-12 columns">
					{!! Form::label('name', 'Programme name in english') !!}
					{!! Form::text('name') !!}
					@if($errors->first('name'))
						<span class='form_error'>{!! $errors->first('name') !!}</span> <br />
					@endif
				</div>
			</div>
			<div class="row collapse">
				<div class="large-12 columns">
					{!! Form::label('description', 'Details in english') !!}
					{!! Form::textarea('description', null, ['id' => 'redactor_sw', 'class' => 'text-area-big']) !!}
					@if($errors->first('description'))
						<span class='form_error'>{!! $errors->first('description') !!}</span> <br />
					@endif
				</div>
			</div>
	    </div>

		<div class="content" id="panel2">
			<div class="row collapse">
				<div class="large-12 columns">
					{!! Form::label('name_en', 'Programme name in Swahili') !!}
					{!! Form::text('name_en') !!}
				</div>
			</div>
			<div class="row collapse">
				<div class="large-12 columns">
					{!! Form::label('description', 'Details in Swahili') !!}
					{!! Form::textarea('description_en', null, ['id' => 'redactor_en', 'class' => 'text-area-big']) !!}
				</div>
			</div>
		</div>



		<div class="row collapse">
			<div class="large-12 small-12 medium-12 columns">
				{!! Form::submit($submitButton, ['class' => 'custom-button']) !!}
			</div>
		</div>

    </div>

</div>

