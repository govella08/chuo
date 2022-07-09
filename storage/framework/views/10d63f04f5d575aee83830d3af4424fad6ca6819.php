<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'><?php echo $errors->first('title'); ?></span>
		<?php echo Form::label('title', 'Title in swahili'); ?>

		<?php echo Form::text('title'); ?>

	</div>
</div>

<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'><?php echo $errors->first('title_en'); ?></span>
		<?php echo Form::label('title_en', 'Title english'); ?>

		<?php echo Form::text('title_en'); ?>

	</div>
</div>


<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'><?php echo $errors->first('main_nav'); ?></span>
		<?php echo Form::label('category', 'Menu Type'); ?>

		<?php echo Form::select('category', array('main_nav' => 'Main Menu'), null, array('class' => '')); ?>


	</div>
</div>


<div class="row">
	<div class="large-12 small-12 medium-12 columns">
		<?php echo Form::submit($submitButton, ['class' => 'custom-button']); ?>

	</div>
</div>





