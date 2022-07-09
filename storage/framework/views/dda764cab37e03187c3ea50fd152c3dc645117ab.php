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
	<?php echo Form::label('content', 'Swahili Description'); ?>

	<?php echo Form::textarea('content'); ?>

</div>

<div class="large-12 columns">
	<span class='form_error'><?php echo $errors->first('content_en'); ?></span>
	<?php echo Form::label('content_en', 'English Content'); ?>

	<?php echo Form::textarea('content_en'); ?>

</div>


<div class="large-12 columns">
	<?php echo Form::hidden('featured',0); ?>

	<?php echo Form::label('featured', ' To Be Used as a slider'); ?>

	<?php echo Form::checkbox('featured'); ?>

</div>

<!-- <div class="large-12 columns">
	<span class='form_error'><?php echo $errors->first('category'); ?></span>
	<?php echo Form::label('category', 'Category'); ?>

	<?php echo Form::select('category', array('' => 'Select Category Type','0'=>'Others','1'=>'State Visits'), null, array('class' => '')); ?>

</div>
 -->
<div class="large-12 columns">
	<span class='form_error'><?php echo $errors->first('type'); ?></span>
	<?php echo Form::label('type', 'Category'); ?>

	<?php echo Form::select('type', array('' => 'Select Gallery Type','photos'=>'Photos','videos'=>'Videos'), null, array('class' => '')); ?>

</div>

<div class="row">
	<div class="large-12 small-12 medium-12 columns">
		<?php echo Form::submit($submitButton, ['class' => 'custom-button']); ?>

	</div>
</div>