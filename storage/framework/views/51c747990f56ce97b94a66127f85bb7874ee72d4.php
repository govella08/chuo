<div class="content">

    <ul class="tabs" data-tab id="myTabs">
      <li class="tab-title active"><a href="#panel1">Swahili</a></li>
      <li class="tab-title"><a href="#panel2">English</a></li>
    </ul>

    <div class="tabs-content">

    <?php if($errors->count()): ?>
	    <span class='form_error'><?php echo $errors->first('title'); ?></span> <br />
	    <span class='form_error'><?php echo $errors->first('description'); ?></span> <br />
	    <span class='form_error'><?php echo $errors->first('fee'); ?></span> <br />
	    <span class='form_error'><?php echo $errors->first('start_time'); ?></span> <br />
	    <span class='form_error'><?php echo $errors->first('end_time'); ?></span> <br />
	    <span class='form_error'><?php echo $errors->first('start_date'); ?></span> <br />
	    <span class='form_error'><?php echo $errors->first('end_date'); ?></span> <br />
	    <span class='form_error'><?php echo $errors->first('location'); ?></span> 
	    <span class='form_error'><?php echo $errors->first('participants'); ?></span> 
	    <span class='form_error'><?php echo $errors->first('objectives'); ?></span> 
    <?php endif; ?>
    

      <div class="content active" id="panel1">
      	<div class="row collapse">
			<div class="large-12 columns">
				<?php echo Form::label('title', 'Title in Swahili'); ?>

				<?php echo Form::text('title'); ?>

			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				<?php echo Form::label('description', 'Content in Swahili'); ?>

				<?php echo Form::textarea('description', null, ['id' => 'redactor_sw', 'class' => 'text-area-big']); ?>

			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				<?php echo Form::label('location', 'Event Location in swahili'); ?>

				<?php echo Form::text('location'); ?>

			</div>
		</div>
		<div class="row collapse">
			<div class="large-12 columns">
				<?php echo Form::label('participants', 'Participants In Swahili'); ?>

				<?php echo Form::textarea('participants', null, ['id' => 'redactor_sw', 'class' => 'text-area-big']); ?>

			</div>
		</div>
		<div class="row collapse">
			<div class="large-12 columns">
				<?php echo Form::label('objectives', 'Objectives in Swahili'); ?>

				<?php echo Form::textarea('objectives', null, ['id' => 'redactor_sw', 'class' => 'text-area-big']); ?>

			</div>
		</div>

      </div>

      <div class="content" id="panel2">
         <div class="row collapse">
			<div class="large-12 columns">
				<?php echo Form::label('title_en', 'Title in english'); ?>

				<?php echo Form::text('title_en'); ?>

			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				<?php echo Form::label('description_en', 'Content in english'); ?>

				<?php echo Form::textarea('description_en', null, ['id' => 'redactor_en', 'class' => 'text-area-big']); ?>

			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				<?php echo Form::label('location_en', 'Event Location in English'); ?>

				<?php echo Form::text('location_en'); ?>

			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				<?php echo Form::label('participants_en', 'Participants in English'); ?>

				<?php echo Form::textarea('participants_en', null, ['id' => 'redactor_sw', 'class' => 'text-area-big']); ?>

			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				<?php echo Form::label('objectives_en', 'Objectives In English'); ?>

				<?php echo Form::textarea('objectives_en', null, ['id' => 'redactor_en', 'class' => 'text-area-big']); ?>

			</div>
		</div>

      </div>

        

        <div class="row collapse">
			<div class="large-12 columns">
				<?php echo Form::label('start_time', 'Event Start Time'); ?>

				<?php echo Form::input('time','start_time'); ?>

			</div>
		</div>
		<div class="row collapse">
			<div class="large-12 columns">
				<?php echo Form::label('end_time', 'Event End Time'); ?>

				<?php echo Form::input('time','end_time'); ?>

			</div>
		</div>

   
        <div class="row collapse">
			<div class="large-12 columns">
				<?php echo Form::label('fee', 'Event Fee'); ?>

				<?php echo Form::text('fee', null, ['id' => 'redactor']); ?>

			</div>
		</div>

		<div class="row collapse">
			<div class="large-6 columns">
				<?php echo Form::label('start_date', 'Event Start Date'); ?>

				<?php echo Form::input('date', 'start_date'); ?>

			</div>

			<div class="large-6 columns">
				<?php echo Form::label('end_date', 'Event End Date'); ?>

				<?php echo Form::input('date', 'end_date'); ?>

			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				<?php echo Form::label('flier', 'Events Flier'); ?>

				<?php echo Form::file('flier'); ?>

			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				<?php echo Form::label('infophone', 'Phone Number'); ?>

				<?php echo Form::text('infophone'); ?>

			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				<?php echo Form::label('infoemail', 'Email'); ?>

				<?php echo Form::text('infoemail'); ?>

			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				<?php echo Form::label('visible', 'Status'); ?>

				<?php echo Form::select('visible', array('1' => 'Active','0'=>'Inactive')); ?>

			</div>
		</div>


		<div class="row collapse">
			<div class="large-12 small-12 medium-12 columns">
				<?php echo Form::submit($submitButton, ['class' => 'custom-button']); ?>

			</div>
		</div>

    </div>

</div>

