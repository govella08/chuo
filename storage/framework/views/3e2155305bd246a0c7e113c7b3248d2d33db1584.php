<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'><?php echo $errors->first('question'); ?></span>
		<?php echo Form::label('question', 'Question in swahili'); ?>

		<?php echo Form::text('question'); ?>

	</div>
</div>

<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'><?php echo $errors->first('question_en'); ?></span>
		<?php echo Form::label('question_en', 'Question english'); ?>

		<?php echo Form::text('question_en'); ?>

	</div>
</div>

<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'><?php echo $errors->first('answer'); ?></span>
		<?php echo Form::label('answer', 'Swahili answer'); ?>

		<?php echo Form::textarea('answer', null, ['id' => 'redactor_sw', 'class' => 'text-area-big']); ?>

	</div>
</div>

<div class="row collapse">
	<div class="large-12 columns">
		<span class='form_error'><?php echo $errors->first('answer_en'); ?></span>
		<?php echo Form::label('answer_en', 'English answer'); ?>

		<?php echo Form::textarea('answer_en', null, ['id' => 'redactor_en', 'class' => 'text-area-big']); ?>

	</div>
</div>

<div class="row collapse">
	<div class="large-12 columns">
		<?php echo Form::label('active', 'Status'); ?>

		<?php echo Form::select('active', array('1' => 'Active','0'=>'Inactive')); ?>

	</div>
</div>

<div class="row">
	<div class="large-12 small-12 medium-12 columns">
		<?php echo Form::submit($submitButton, ['class' => 'custom-button']); ?>

	</div>
</div>