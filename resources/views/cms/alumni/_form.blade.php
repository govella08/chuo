<div class="content">

    <ul class="tabs" data-tab id="myTabs">
      <li class="tab-title active"><a href="#panel1">Swahili</a></li>
      <li class="tab-title"><a href="#panel2">English</a></li>
    </ul>

    <div class="tabs-content">

	    @if($errors->count())
			<span class='form_error'>{!! $errors->first('fullname') !!}</span> <br />
			<span class='form_error'>{!! $errors->first('title') !!}</span> <br />
		    <span class='form_error'>{!! $errors->first('title_en') !!}</span> <br />
		    <span class='form_error'>{!! $errors->first('alumni') !!}</span> <br />
			<span class='form_error'>{!! $errors->first('alumni_en') !!}</span> <br />
		    <span class='form_error'>{!! $errors->first('photo_url') !!}</span> <br />
	    @endif
	    
	    <div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('fullname', 'Person Full name') !!}
				{!! Form::text('fullname') !!}

				@if($errors->first('fullname'))
					<span class='form_error'>{!! $errors->first('fullname') !!}</span> <br /> 
				@endif
			</div>
		</div>

	    <div class="content active" id="panel1">
			<div class="row collapse">
				<div class="large-12 columns">
					{!! Form::label('title', 'Title/Position in english') !!}
					{!! Form::text('title') !!}
					@if($errors->first('title'))
						<span class='form_error'>{!! $errors->first('title') !!}</span> <br />
					@endif
				</div>
			</div>
			<div class="row collapse">
				<div class="large-12 columns">
					{!! Form::label('alumni', 'Alumni in english') !!}
					{!! Form::textarea('alumni', null, ['id' => 'redactor_sw', 'class' => 'text-area-big']) !!}
					@if($errors->first('alumni'))
						<span class='form_error'>{!! $errors->first('alumni') !!}</span> <br />
					@endif
				</div>
			</div>
	    </div>

		<div class="content" id="panel2">
			<div class="row collapse">
				<div class="large-12 columns">
					{!! Form::label('title_en', 'Title/Position in Swahili') !!}
					{!! Form::text('title_en') !!}
				</div>
			</div>
			<div class="row collapse">
				<div class="large-12 columns">
					{!! Form::label('alumni_en', 'Alumni in Swahili') !!}
					{!! Form::textarea('alumni_en', null, ['id' => 'redactor_en', 'class' => 'text-area-big']) !!}
				</div>
			</div>
		</div>

	    <div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('photo_url', 'Person Profile Photo') !!}
				{!! Form::file('photo_url') !!}
			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 small-12 medium-12 columns">
				{!! Form::submit($submitButton, ['class' => 'custom-button']) !!}
			</div>
		</div>

    </div>

</div>

