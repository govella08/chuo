
<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'><?php echo $errors->first('physical_address'); ?></span>
		<?php echo Form::label('physical_address', 'Physical Address In Swahili'); ?>

		<?php echo Form::text('physical_address'); ?>

	</div>
</div>

<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'><?php echo $errors->first('physical_address_en'); ?></span>
		<?php echo Form::label('physical_address_en', 'Physical Address In English'); ?>

		<?php echo Form::text('physical_address_en'); ?>

	</div>
</div>

<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'><?php echo $errors->first('phone'); ?></span>
		<?php echo Form::label('phone', 'Phone'); ?>

		<?php echo Form::text('phone'); ?>

	</div>
</div>

<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'><?php echo $errors->first('fax'); ?></span>
		<?php echo Form::label('fax', 'Fax'); ?>

		<?php echo Form::text('fax'); ?>

	</div>
</div>
<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'><?php echo $errors->first('hotline'); ?></span>
		<?php echo Form::label('hotline', 'Hotline'); ?>

		<?php echo Form::text('hotline'); ?>

	</div>
</div>

<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'><?php echo $errors->first('email'); ?></span>
		<?php echo Form::label('email', 'email'); ?>

		<?php echo Form::email('email'); ?>

	</div>
</div>

<div class="row">
	<div class="large-12 small-12 medium-12 columns">
		<?php echo Form::submit($submitButton, ['class' => 'custom-button']); ?>

	</div>
</div>

