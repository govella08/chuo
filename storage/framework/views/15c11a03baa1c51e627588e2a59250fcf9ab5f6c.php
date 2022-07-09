<p><span class='form_error'></span></p>



<div class="large-6 columns">
	<span class='form_error'><?php echo $errors->first('salutation_sw'); ?></span>
	<?php echo Form::label('salutation', 'Swahili Salutation'); ?>

	<?php echo Form::text('salutation'); ?>

</div>

<div class="large-6 columns">
	<span class='form_error'><?php echo $errors->first('salutation_en'); ?></span>
	<?php echo Form::label('salutation_en', 'English Salutation'); ?>

	<?php echo Form::text('salutation_en'); ?>

</div>


<div class="large-12 columns">
	<span class='form_error'><?php echo $errors->first('name'); ?></span>
	<?php echo Form::label('name', 'Full Name'); ?>

	<?php echo Form::text('name'); ?>

</div>


<div class="large-12 columns">
	<span class='form_error'><?php echo $errors->first('title_sw'); ?></span>
	<?php echo Form::label('title', 'Swahili title'); ?>

	<?php echo Form::text('title'); ?>

</div>
<div class="large-12 columns">
	<span class='form_error'><?php echo $errors->first('title_en'); ?></span>
	<?php echo Form::label('title_en', 'English title'); ?>

	<?php echo Form::text('title_en'); ?>

</div>


<div class="large-12 columns">
	<span class='form_error'><?php echo $errors->first('content_sw'); ?></span>
	<?php echo Form::label('content', 'Swahili Content'); ?>

	<?php echo Form::textarea('content',null, ['id' => 'redactor_sw']); ?>

</div>

<div class="large-12 columns">
	<span class='form_error'><?php echo $errors->first('content_en'); ?></span>
	<?php echo Form::label('content_en', 'English Content'); ?>

	<?php echo Form::textarea('content_en',null, ['id' => 'redactor_en']); ?>

</div>


	<div class="large-12 columns">
		<?php echo Form::label('active', 'Status'); ?>

		<?php echo Form::select('active', array('1' => 'Active','0'=>'Inactive')); ?>

	</div>



<div class="row">
	<div class="large-12 small-12 medium-12 columns">
		<?php echo Form::submit($submitButton, ['class' => 'custom-button']); ?>

	</div>
</div>

