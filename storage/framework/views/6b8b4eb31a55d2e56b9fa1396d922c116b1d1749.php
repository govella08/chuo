<div class="content">

    <ul class="tabs" data-tab id="myTabs">
      <li class="tab-title active"><a href="#panel1">Swahili</a></li>
      <li class="tab-title"><a href="#panel2">English</a></li>
    </ul>

    <div class="tabs-content">

    <?php if($errors->count()): ?>
    	<span class='form_error'><?php echo $errors->first('title_en'); ?></span> <br />
	    <span class='form_error'><?php echo $errors->first('title'); ?></span> <br />
		<span class='form_error'><?php echo $errors->first('url'); ?></span> 
    <?php endif; ?>
    

      <div class="content active" id="panel1">
      	<div class="row collapse">
			<div class="large-12 columns">
				<span class='form_error'><?php echo $errors->first('title'); ?></span>
				<?php echo Form::label('title', 'Related Link title in in swahili *'); ?>

				<?php echo Form::text('title'); ?>

			</div>
		</div>
      
      </div>

      <div class="content" id="panel2">

          <div class="row collapse">
			<div class="large-12 columns">
				<span class='form_error'><?php echo $errors->first('title_en'); ?></span>
				<?php echo Form::label('title_en', 'Related Link title in  english'); ?>

				<?php echo Form::text('title_en'); ?>

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

</div>

