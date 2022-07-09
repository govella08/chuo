<div class="content">

    <ul class="tabs" data-tab id="myTabs">
      <li class="tab-title active"><a href="#panel1">Swahili</a></li>
      <li class="tab-title"><a href="#panel2">English</a></li>
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
				{!! Form::label('title', 'Title in Swahili') !!}
				{!! Form::text('title') !!}
			</div>
		</div>
		<div class="row collapse">
			<span class='form_error'>{!! $errors->first('summary') !!}</span>
			{!! Form::label('summary', 'Swahili Summary') !!}
			{!! Form::textarea('summary') !!}
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('file', 'File in  swahili version') !!}
				{!! Form::file('file') !!}
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


		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('deadline', 'Deadline') !!}
				{!! Form::date('deadline') !!}
			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('published', 'Published Date') !!}
				{!! Form::date('published') !!}
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

