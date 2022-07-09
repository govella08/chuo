<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'><?php echo $errors->first('name'); ?></span>
		<?php echo Form::label('name', 'Name'); ?>

		<?php echo Form::text('name'); ?>

	</div>
</div>

<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'><?php echo $errors->first('email'); ?></span>
		<?php echo Form::label('email', 'Email'); ?>

		<?php echo Form::text('email'); ?>

	</div>
</div>

<div class="row">
	<div class="large-12 small-12 medium-12 columns">
		<?php echo Form::submit($submitButton, ['class' => 'custom-button']); ?>

	</div>
</div>