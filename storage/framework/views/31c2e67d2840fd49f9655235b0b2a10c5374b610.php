<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'><?php echo $errors->first('name'); ?></span>
		<?php echo Form::label('name', 'Role Name'); ?>

		<?php echo Form::text('name'); ?>

	</div>
</div>

<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'><?php echo $errors->first('display_name'); ?></span>
		<?php echo Form::label('display_name', 'Display Name'); ?>

		<?php echo Form::text('display_name'); ?>

	</div>
</div>

<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'><?php echo $errors->first('description'); ?></span>
		<?php echo Form::label('description', 'Description'); ?>

		<?php echo Form::textarea('description'); ?>

	</div>
</div>




<div class="row">
	<div class="large-12 small-12 medium-12 columns">
		<?php echo Form::submit($submitButton, ['class' => 'custom-button']); ?>

	</div>
</div>