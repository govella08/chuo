<div class="content">

    <ul class="tabs" data-tab id="myTabs">
      <li class="tab-title active"><a href="#panel1">Swahili</a></li>
      <li class="tab-title"><a href="#panel2">English</a></li>
    </ul>

    <div class="tabs-content">

	    <?php if($errors->count()): ?>
		    <span class='form_error'><?php echo $errors->first('name_en'); ?></span> <br />
		    <span class='form_error'><?php echo $errors->first('description_en'); ?></span> <br />
			<span class='form_error'><?php echo $errors->first('level_id'); ?></span> 
	    <?php endif; ?>
	    
		<div class="row collapse">
			<div class="large-12 columns">
				<?php echo Form::label('level_id', 'Select Programme level'); ?>

				<?php echo Form::select('level_id',$levels,null,[]); ?>

			</div>
		</div>

	    <div class="content active" id="panel1">
			<div class="row collapse">
				<div class="large-12 columns">
					<?php echo Form::label('name', 'Programme name in english'); ?>

					<?php echo Form::text('name'); ?>

					<?php if($errors->first('name')): ?>
						<span class='form_error'><?php echo $errors->first('name'); ?></span> <br />
					<?php endif; ?>
				</div>
			</div>
			<div class="row collapse">
				<div class="large-12 columns">
					<?php echo Form::label('description', 'Details in english'); ?>

					<?php echo Form::textarea('description', null, ['id' => 'redactor_sw', 'class' => 'text-area-big']); ?>

					<?php if($errors->first('description')): ?>
						<span class='form_error'><?php echo $errors->first('description'); ?></span> <br />
					<?php endif; ?>
				</div>
			</div>
	    </div>

		<div class="content" id="panel2">
			<div class="row collapse">
				<div class="large-12 columns">
					<?php echo Form::label('name_en', 'Programme name in Swahili'); ?>

					<?php echo Form::text('name_en'); ?>

				</div>
			</div>
			<div class="row collapse">
				<div class="large-12 columns">
					<?php echo Form::label('description', 'Details in Swahili'); ?>

					<?php echo Form::textarea('description_en', null, ['id' => 'redactor_en', 'class' => 'text-area-big']); ?>

				</div>
			</div>
		</div>



		<div class="row collapse">
			<div class="large-12 small-12 medium-12 columns">
				<?php echo Form::submit($submitButton, ['class' => 'custom-button']); ?>

			</div>
		</div>

    </div>

</div>

