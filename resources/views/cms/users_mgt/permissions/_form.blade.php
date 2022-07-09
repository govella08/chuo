<div class="content">

    <ul class="tabs" data-tab id="myTabs">
      <li class="tab-title active"><a href="#panel1">English</a></li>
      <li class="tab-title"><a href="#panel2">Swahili</a></li>
    </ul>

    <div class="tabs-content">

    @if($errors->count())
    	@foreach($errors->all() as $error)
    		<span class='form_error'>{{$error}}</span> <br />
		@endforeach
    @endif
    

      <div class="content active" id="panel1">

        <div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('title_en', 'Title in english') !!}
				{!! Form::text('title_en') !!}
			</div>
		</div>

		<div class="row collapse">
			<span class='form_error'>{!! $errors->first('summary_en') !!}</span>
			{!! Form::label('summary_en', 'English Summary') !!}
			{!! Form::textarea('summary_en') !!}
		</div>
		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('file_en', 'File in  english version') !!}
				{!! Form::file('file_en') !!}
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
			<span class='form_error'>{!! $errors->first('summary_sw') !!}</span>
			{!! Form::label('summary_sw', 'Swahili Summary') !!}
			{!! Form::textarea('summary_sw') !!}
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('file_sw', 'File in  swahili version') !!}
				{!! Form::file('file_sw') !!}
			</div>
		</div>
      </div>


		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('deadline', 'Deadline') !!}
				{!! Form::input('date', 'deadline') !!}
			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('published', 'Published Date') !!}
				{!! Form::input('date', 'published') !!}
			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 small-12 medium-12 columns">
				{!! Form::submit($submitButton, ['class' => 'custom-button']) !!}
			</div>
		</div>

    </div>

</div>

