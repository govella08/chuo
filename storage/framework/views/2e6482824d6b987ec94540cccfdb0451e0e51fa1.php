<div class="large-12 columns">
	<span class='form_error'><?php echo $errors->first('title'); ?></span>
	<?php echo Form::label('title', 'Swahili title'); ?>

	<?php echo Form::text('title'); ?>

</div>

<div class="large-12 columns">
	<span class='form_error'><?php echo $errors->first('title_en'); ?></span>
	<?php echo Form::label('title_en', 'English title'); ?>

	<?php echo Form::text('title_en'); ?>

</div>


<!-- <div class="large-12 columns">
	<?php echo Form::label('active', 'Active'); ?>

	<?php echo Form::select('active', array('0'=>'In Active', '1'=>'Active'), 1, array('id' => 'internals')); ?>

</div> -->

<div class="large-12 columns">
	<span class='form_error'><?php echo $errors->first('url'); ?></span><br />
	<span class="mini_desc">(Please select a type of link do you want to create?)</span><br />
	<span class='form_error'><?php echo $errors->first('link'); ?></span>
	<?php echo Form::radio('link', 1, true, array('class' => 'int_link',"checked"=>"checked")); ?>

	<?php echo Form::label('link', 'Internal link'); ?>


	<?php echo Form::radio('link', 0, false, array('class' => 'ext_link')); ?>

	<?php echo Form::label('link', 'External link'); ?>

</div>

<div class="large-12 columns">
	
	<?php echo Form::url('url', null, array('class' => "external")); ?>

	<?php echo Form::select('url', $selectmenu, null, array('class' => 'internal')); ?>

	

</div>

<?php echo Form::hidden('menu_id'); ?>

	<div class="large-8 columns">
			<?php echo Form::submit('Save', array('class' => 'tiny button')); ?>

	</div>


