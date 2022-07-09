<div class="content content-large">

	

	<div class="row collapse">

		<div class="large-12 columns">
			<span class='form_error'><?php echo $errors->first('content'); ?></span>
			<?php echo Form::label('content', 'Swahili content'); ?>

			<?php echo Form::textarea('content', null, ['id' => 'redactor_en', 'class' => 'text-area-big']); ?>

		</div>

		<div class="large-12 columns">
			<span class='form_error'><?php echo $errors->first('content_en'); ?></span>
			<?php echo Form::label('content_en', 'English content'); ?>

			<?php echo Form::textarea('content_en', null, ['id' => 'redactor_en', 'class' => 'text-area-big']); ?>

		</div>

	</div>

	<div class="row collapse">
		<div class="large-16 small-12 medium-12 columns">
			<?php echo Form::submit($submitButton, ['class' => 'custom-button']); ?>

		</div>
	</div>

</div>