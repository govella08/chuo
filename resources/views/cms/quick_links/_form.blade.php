<div class="content">

    <ul class="tabs" data-tab id="myTabs">
      <li class="tab-title active"><a href="#panel1">Swahili</a></li>
      <li class="tab-title"><a href="#panel2">English</a></li>
    </ul>

    <div class="tabs-content">

    @if($errors->count())
    	<span class='form_error'>{!! $errors->first('title_en') !!}</span> <br />
	    <span class='form_error'>{!! $errors->first('title') !!}</span> <br />
		<span class='form_error'>{!! $errors->first('url') !!}</span> 
    @endif
    

      <div class="content active" id="panel1">
      	 
      	<div class="row collapse">
			<div class="large-12 columns">
				<span class='form_error'>{!! $errors->first('title') !!}</span>
				{!! Form::label('title', 'Quick Link title in in swahili') !!}
				{!! Form::text('title') !!}
			</div>
		</div>

      </div>

      <div class="content" id="panel2">
       
        <div class="row collapse">
			<div class="large-12 columns">
				<span class='form_error'>{!! $errors->first('title_en') !!}</span>
				{!! Form::label('title_en', 'Quick Link title in  english') !!}
				{!! Form::text('title_en') !!}
			</div>
		</div>
      	
      </div>

		<div class="row collapse">
			<div class="large-12 columns">
				<span class="mini_desc">(Please select a type of link do you want to create?)</span><br />
				<span class='form_error'>{!! $errors->first('link')  !!}</span>
				{!! Form::radio('link', 1, true, array('class' => 'int_link',"checked"=>"checked"))  !!}
				{!! Form::label('link', 'Internal link')  !!}

				{!! Form::radio('link', 0, false, array('class' => 'ext_link'))  !!}
				{!! Form::label('link', 'External link')  !!}
			</div>

			<div class="large-12 columns">
				{!! Form::url('url', null, array('class' => "external"))  !!}
				{!! Form::select('url', App\Models\Menu::selectMenu(), null, array('class' => 'internal')) !!}

			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 small-12 medium-12 columns">
				{!! Form::submit($submitButton, ['class' => 'custom-button']) !!}
			</div>
		</div>

    </div>

</div>

