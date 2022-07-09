<div class="content">

    <ul class="tabs" data-tab id="myTabs">
      <li class="tab-title active"><a href="#panel1">Swahili</a></li>
      <li class="tab-title"><a href="#panel2">English</a></li>
    </ul>

    <div class="tabs-content">

	    @if($errors->count())
		    <span class='form_error'>{!! $errors->first('title_en') !!}</span> <br />
		    <span class='form_error'>{!! $errors->first('content_en') !!}</span> <br />
		    <span class='form_error'>{!! $errors->first('photo_url') !!}</span> <br />
		    <span class='form_error'>{!! $errors->first('position') !!}</span> <br />
			<span class='form_error'>{!! $errors->first('category_id') !!}</span> 
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
					{!! Form::label('content', 'Details/Biography in english') !!}
					{!! Form::textarea('content', null, ['id' => 'redactor_sw', 'class' => 'text-area-big']) !!}
					@if($errors->first('content'))
						<span class='form_error'>{!! $errors->first('content') !!}</span> <br />
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
					{!! Form::label('content_en', 'Details/Biography in Swahili') !!}
					{!! Form::textarea('content_en', null, ['id' => 'redactor_en', 'class' => 'text-area-big']) !!}
				</div>
			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('email', 'Email') !!}
				{!! Form::text('email') !!}
			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('category_id', 'Select Administration Category') !!}
				{!! Form::select('category_id',$categories,null,[]) !!}
			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('group_id', 'Select Administration Group') !!}
				{!! Form::select('group_id',$groups,null,[]) !!}
			</div>
		</div>  

		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('position', 'Position') !!}
				{!! Form::select('position', array('1' => 'Row 1','2'=>'Row 2','3'=>'Row 3','4'=>'Row 4', '5'=>'Row 5')) !!}
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

