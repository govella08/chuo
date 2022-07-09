<div class="content">

    <ul class="tabs" data-tab id="myTabs">
      <li class="tab-title active"><a href="#panel1">English</a></li>
      <li class="tab-title"><a href="#panel2">Swahili</a></li>
    </ul>

    <div class="tabs-content">

    @if($errors->count())
    	<span class='form_error'>{!! $errors->first('title_en') !!}</span> <br />
	    <span class='form_error'>{!! $errors->first('title_sw') !!}</span> <br />
		<span class='form_error'>{!! $errors->first('summary_en') !!}</span> <br />
		<span class='form_error'>{!! $errors->first('summary_sw') !!}</span> <br />
		<span class='form_error'>{!! $errors->first('content_en') !!}</span> <br />
		<span class='form_error'>{!! $errors->first('content_sw') !!}</span> <br />
		<span class='form_error'>{!! $errors->first('photo_url') !!}</span> 
    @endif
    

      <div class="content active" id="panel1">

        <div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('title_en', 'Title in english') !!}
				{!! Form::text('title_en') !!}
			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('content_en', 'Content in english') !!}
				{!! Form::textarea('content_en', null, ['id' => 'redactor_en', 'class' => 'text-area-big']) !!}
			</div>
		</div>

      </div>

      <div class="content" id="panel2">
        
      	<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('title_sw', 'Title in Swahili') !!}
				{!! Form::text('title_sw') !!}
			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('content_sw', 'Content in Swahili') !!}
				{!! Form::textarea('content_sw', null, ['id' => 'redactor_sw', 'class' => 'text-area-big']) !!}
			</div>
		</div>

      </div>


      	<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('photo_url', 'Cover Photo') !!}
				{!! Form::file('photo_url') !!}
			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('active', 'Status') !!}
				{!! Form::select('active', array('1' => 'Active','0'=>'Inactive')) !!}
			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 small-12 medium-12 columns">
				{!! Form::submit($submitButton, ['class' => 'custom-button']) !!}
			</div>
		</div>

    </div>

</div>

