<div class="content">

	<ul class="tabs" data-tab id="myTabs">
		<li class="tab-title active"><a href="#panel1">Swahili</a></li>
		<li class="tab-title"><a href="#panel2">English</a></li>
	</ul>

	<div class="tabs-content">

		@if($errors->count())
		<span class='form_error'>{!! $errors->first('title_en') !!}</span> <br />
		<span class='form_error'>{!! $errors->first('title') !!}</span> <br />
		<span class='form_error'>{!! $errors->first('file_en') !!}</span> <br />
		<span class='form_error'>{!! $errors->first('file') !!}</span> <br />
		<span class='form_error'>{!! $errors->first('published_date') !!}</span> <br />		
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
					{!! Form::label('file', 'Speech File in  swahili version') !!}
					{!! Form::file('file') !!}
				</div>
			</div>

			<div class="row collapse">
				<div class="large-12 columns">
					{!! Form::label('content', 'Content in Swahili') !!}
					{!! Form::textarea('content', null, ['id' => 'redactor_sw', 'class' => 'text-area-big']) !!}
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
					{!! Form::label('file_en', 'Speech File in  english version') !!}
					{!! Form::file('file_en') !!}
				</div>
			</div>

			<div class="row collapse">
				<div class="large-12 columns">
					{!! Form::label('content_en', 'Content in english') !!}
					{!! Form::textarea('content_en', null, ['id' => 'redactor_en', 'class' => 'text-area-big']) !!}
				</div>
			</div>
			
		</div>
		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('active', 'Status') !!}
				{!! Form::select('active', array('1' => 'Active','0'=>'Inactive')) !!}
			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('published_date', 'Speech Date') !!}
				{!! Form::input('date', 'published_date') !!}
			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 small-12 medium-12 columns">
				{!! Form::submit($submitButton, ['class' => 'custom-button']) !!}
			</div>
		</div>
	</div>

</div>

