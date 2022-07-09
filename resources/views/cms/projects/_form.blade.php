<div class="content">

	<ul class="tabs" data-tab id="myTabs">
		<li class="tab-title active"><a href="#panel1">Swahili</a></li>
		<li class="tab-title"><a href="#panel2">English</a></li>
	</ul>

	<div class="tabs-content">

		@if($errors->count())
		<span class='form_error'>{!! $errors->first('title_en') !!}</span> <br />
		<span class='form_error'>{!! $errors->first('title') !!}</span> <br />
		<span class='form_error'>{!! $errors->first('content_en') !!}</span> <br />
		<span class='form_error'>{!! $errors->first('content') !!}</span> <br />
		<span class='form_error'>{!! $errors->first('file_en') !!}</span> <br />
		<span class='form_error'>{!! $errors->first('file') !!}</span> <br />
		<span class='form_error'>{!! $errors->first('start_date') !!}</span> <br />
		<span class='form_error'>{!! $errors->first('end_date') !!}</span> <br />
		<span class='form_error'>{!! $errors->first('category_id') !!}</span> 
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
					{!! Form::label('content', 'Content in Swahili') !!}
					{!! Form::textarea('content', null, ['id' => 'redactor_sw', 'class' => 'text-area-big']) !!}
				</div>
			</div> 
			<div class="row collapse">
				<div class="large-12 columns">
					{!! Form::label('duration', 'Duration in swahili') !!}
					{!! Form::text('duration') !!}
				</div>
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
				<div class="large-12 columns">
					{!! Form::label('content_en', 'Content in english') !!}
					{!! Form::textarea('content_en', null, ['id' => 'redactor_en', 'class' => 'text-area-big']) !!}
				</div>
			</div>
			<div class="row collapse">
				<div class="large-12 columns">
					{!! Form::label('duration_en', 'Duration in english') !!}
					{!! Form::text('duration_en') !!}
				</div>
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
				{!! Form::label('implementer', 'Implementation Agency') !!}
				{!! Form::text('implementer') !!}
			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('area_of_coverage', 'Area of Coverage') !!}
				{!! Form::text('area_of_coverage') !!}
			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('number_of_beneficiaries', 'Number of Beneficiaries') !!}
				{!! Form::text('number_of_beneficiaries') !!}
			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('category_id', 'Project Category') !!}
				{!! Form::select('category_id',$categories,null,[]) !!}
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
				{!! Form::label('project_status', 'Project Status') !!}
				{!! Form::select('project_status', array('1' => 'Start','2'=>'On going','3'=>'Pending','4'=>'Stop','5'=>'Complete','6'=>'Finished')) !!}
			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('owner', 'Owner') !!}
				{!! Form::text('owner') !!}
			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('sponsor', 'Sponsor') !!}
				{!! Form::text('sponsor') !!}
			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('start_date', 'Start Date') !!}
				{!! Form::date('start_date') !!}
			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('end_date', 'End Date') !!}
				{!! Form::date('end_date') !!}
			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 small-12 medium-12 columns">
				{!! Form::submit($submitButton, ['class' => 'custom-button']) !!}
			</div>
		</div>

	</div>

</div>

