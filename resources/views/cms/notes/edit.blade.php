<div class="content-panel">

	<div class="title">
		Edit {{ $cabinets->title_en }}
	</div>

	<div class="content">
		
		{!! Form::model($cabinets, ['url' =>['cabinets', $cabinets->cab_id], 'method' => 'PATCH', 'class' => 'update-formblkjh', 'enctype' => 'multipart/form-data']) !!}
			
			<p><span class='form_error'></span></p>
		  	<div class="large-12 columns">
				{!! Form::label('name', 'Name') !!}
				{!! Form::text('name') !!}
			</div>
				
			<div class="large-12 columns">
				{!! Form::label('title_en', 'English title') !!}
				{!! Form::text('title_en') !!}
			</div>

			<div class="large-12 columns">
				{!! Form::label('title_sw', 'Swahili title') !!}
				{!! Form::text('title_sw') !!}
            </div>

            <div class="row">
			  <div class="large-12 medium-12 small-12 columns">
					{!! Form::label('hierarchy', "Hierarchy Level") !!}
					{!! Form::select('level', array("president" => "President", "vice" => "Vice President","prime"=>"Prime Minister","zanzibarpress"=>"President of Zanzibar","minister"=>"Minister"), null, array("id" => "pubstype")) !!}
				</div>
			</div>
            <div class="large-12 columns">
				{!! Form::label('photo_url', "Photo") !!}
				{!! Form::file('photo') !!}
			</div>

			<div class="row">

				<div class="large-12 medium-12 small-12 columns">
					{!! Form::label('date', 'Date') !!}
					{!! Form::text('start_date') !!}					
				</div>
			</div>

			<div class="large-12 columns">
				{!! Form::label('eduback_en', 'Education Background (en)') !!}
				{!! Form::textarea('edu_background_en', null, array('id' => 'redactor_en', 'class' => 'text-area-small')) !!}
			
			</div>

			<div class="large-12 columns">
				{!! Form::label('eduback_sw', 'Education Background (sw)') !!}
				{!! Form::textarea('edu_background_sw', null, array('id' => 'redactor_en', 'class' => 'text-area-small')) !!}
			
			</div>

			<div class="large-12 columns">
				{!! Form::label('briefhistory_en', 'Brief History (en)') !!}
				{!! Form::textarea('history_en', null, array('id' => 'redactor_en', 'class' => 'text-area-small')) !!}
			
			</div>

		  	<div class="large-12 columns">
				{!! Form::label('briefhistory_sw', 'Brief History (sw)') !!}
				{!! Form::textarea('history_sw', null, array('id' => 'redactor_en', 'class' => 'text-area-small')) !!}
			
			</div>


			<div class="row">
			  <div class="large-12 medium-12 small-12 columns">
					{!! Form::label('published', "Published") !!}
					{!! Form::select('published', array("yes" => "Yes", "no" => "No"), null, array("id" => "pubstype")) !!}
				</div>
			</div>
			<div class="row">
				<div class="large-12 medium-12 small-12 columns">
				{!! Form::Submit("Update", ['class' => 'custom-button']) !!}
				</div>
			</div> 

		{!! Form::close() !!}

	</div>

</div>