<div class="content">

    <ul class="tabs" data-tab id="myTabs">
      <li class="tab-title active"><a href="#panel1">English</a></li>
    </ul>

    <div class="tabs-content">

    @if($errors->count())
    	<span class='form_error'>{!! $errors->first('name') !!}</span> <br />
    @endif
    

      <div class="content active" id="panel1">

        <div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('name', 'Name') !!}
				{!! Form::text('name') !!}
			</div>
		</div>

      </div>

		{{-- <!-- <div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('json_file', 'Cover Json') !!}
				{!! Form::file('json_file') !!}
			</div>
		</div> --> --}}
		
	{{-- <!-- 	<div class="row collapse">
			<div class="large-12 columns">
				{{ Form::bsText('id',$select,[$news->id]) }}
			</div>
		</div> --> --}}

		<div class="row collapse">
			<div class="large-12 small-12 medium-12 columns">
				{!! Form::submit($submitButton, ['class' => 'custom-button']) !!}
			</div>
		</div>

    </div>

</div>

