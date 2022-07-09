<div class="content">

    <ul class="tabs" data-tab id="myTabs">
      <li class="tab-title active"><a href="#panel1">English</a></li>
    </ul>

    <div class="tabs-content">

    <?php if($errors->count()): ?>
    	<span class='form_error'><?php echo $errors->first('name'); ?></span> <br />
    <?php endif; ?>
    

      <div class="content active" id="panel1">

        <div class="row collapse">
			<div class="large-12 columns">
				<?php echo Form::label('name', 'Name'); ?>

				<?php echo Form::text('name'); ?>

			</div>
		</div>

      </div>

		
		
	

		<div class="row collapse">
			<div class="large-12 small-12 medium-12 columns">
				<?php echo Form::submit($submitButton, ['class' => 'custom-button']); ?>

			</div>
		</div>

    </div>

</div>

