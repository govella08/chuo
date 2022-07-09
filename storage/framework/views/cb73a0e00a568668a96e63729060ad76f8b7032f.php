<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'><?php echo $errors->first('title'); ?></span>
		<?php echo Form::label('title', 'Category title in  swahili'); ?>

		<?php echo Form::text('title'); ?>

	</div>
</div>

<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'><?php echo $errors->first('title_en'); ?></span>
		<?php echo Form::label('title_en', 'Category title in in english '); ?>

		<?php echo Form::text('title_en'); ?>

	</div>
</div>

<div class="large-12 columns">
	<span class='form_error'><?php echo $errors->first('has_label'); ?></span><br />
	<?php echo Form::label('', 'Should have Group label'); ?>

	<?php echo Form::radio('has_label', 1, array('class' => 'has_label',"checked"=>"checked")); ?>

	<?php echo Form::label('has_label', 'Yes'); ?>


	<?php echo Form::radio('has_label', 0, array('class' => 'has_label')); ?>

	<?php echo Form::label('has_label', 'No'); ?>

</div>

<div class="row collapse">
	<div class="large-12 small-12 medium-12 columns">
		<?php echo Form::submit($submitButton, ['class' => 'custom-button']); ?>

	</div>
</div>