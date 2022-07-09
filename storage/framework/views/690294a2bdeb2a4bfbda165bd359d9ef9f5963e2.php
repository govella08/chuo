<div class="content">
    
  	<div class="row collapse">
		<div class="large-12 columns">
			<span class='form_error'><?php echo $errors->first('title'); ?></span>
			<?php echo Form::label('title', 'Social link title'); ?>

			<?php echo Form::select('title', $social_media, null, []); ?>

		</div>
	</div>

  </div>

	<div class="row collapse">
		<div class="large-12 columns">
			<span class='form_error'><?php echo $errors->first('url'); ?></span>
			<?php echo Form::label('url', "Link/URL"); ?>

			<?php echo Form::input('url', 'url', null, array('required' => 'required')); ?>

		</div>
	</div>

	<div class="row collapse">
		<div class="large-12 small-12 medium-12 columns">
			<?php echo Form::submit($submitButton, ['class' => 'custom-button']); ?>

		</div>
	</div>
</div>