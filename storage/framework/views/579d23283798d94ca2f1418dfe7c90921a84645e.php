<?php echo Form::hidden('gallery_id'); ?>


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


<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'><?php echo $errors->first('url'); ?></span>
		<?php echo Form::label('url', 'Youtube Video'); ?>

		<?php echo Form::text('url'); ?>

	</div>
</div>




<div class="row">
	<div class="large-12 small-12 medium-12 columns">
		<?php echo Form::submit($submitButton, ['class' => 'custom-button']); ?>

	</div>
</div>