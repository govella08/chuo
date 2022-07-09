
<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'><?php echo $errors->first('title'); ?></span>
		<?php echo Form::label('title', 'Image Caption in in Swahili'); ?>

		<?php echo Form::text('title'); ?>

	</div>
</div>

<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'><?php echo $errors->first('title_en'); ?></span>
		<?php echo Form::label('title_en', 'Image Caption in English'); ?>

		<?php echo Form::text('title_en'); ?>

	</div>
</div>

<div class="large-12 columns">
	<span class='form_error'><?php echo $errors->first('content'); ?></span>
	<?php echo Form::label('content', 'Swahili Summary'); ?>

	<?php echo Form::textarea('content'); ?>

</div>

<div class="large-12 columns">
	<span class='form_error'><?php echo $errors->first('content_en'); ?></span>
	<?php echo Form::label('content_en', 'English Summary'); ?>

	<?php echo Form::textarea('content_en'); ?>

</div>


<div class="large-12 columns">
	<span class='form_error'><?php echo $errors->first('mediaurl'); ?></span>
	<?php echo Form::label('mediaurl', 'Upload Photo (Preferred size [1125X400])'); ?>

	<?php echo Form::file('mediaurl'); ?>

</div>

	<div class="large-12 columns">
		<?php echo Form::label('status', 'Show Contents on Slider'); ?>

		<?php echo Form::select('status', array('0'=>'Hide Contents on Slider','1' => 'Show Contents on Slider')); ?>

	</div>




<div class="row">
	<div class="large-12 small-12 medium-12 columns">
		<?php echo Form::submit($submitButton, ['class' => 'custom-button']); ?>

	</div>
</div>