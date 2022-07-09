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


<!-- <div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'><?php echo $errors->first('summary_en'); ?></span>
		<?php echo Form::label('summary_en', 'English Summary'); ?>

		<?php echo Form::textarea('summary_en'); ?>

	</div>
</div>
<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'><?php echo $errors->first('summary_sw'); ?></span>
		<?php echo Form::label('summary_sw', 'Swahili Summary'); ?>

		<?php echo Form::textarea('summary_sw'); ?>

	</div>
</div> -->

<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'><?php echo $errors->first('content'); ?></span>
		<?php echo Form::label('content', 'Swahili Content'); ?>

		<?php echo Form::textarea('content',null, ['id' => 'redactor_sw']); ?>

	</div>
</div>

<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'><?php echo $errors->first('content_en'); ?></span>
		<?php echo Form::label('content_en', 'English Content'); ?>

		<?php echo Form::textarea('content_en',null, ['id' => 'redactor_en']); ?>

	</div>
</div>

<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'><?php echo $errors->first('page_category_id'); ?></span>
		<?php echo Form::label('page_category_id', 'Category'); ?>

		<?php echo Form::select('page_category_id', $categories, null, array('class' => '')); ?>

	</div>
</div>


<div class="row collapse">
	<div class="large-12 small-12 medium-12 columns">
		<?php echo Form::submit($submitButton, ['class' => 'custom-button']); ?>

	</div>
</div>