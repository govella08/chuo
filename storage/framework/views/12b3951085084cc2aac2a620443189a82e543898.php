<div class="content">

    <ul class="tabs" data-tab id="myTabs">
      <li class="tab-title active"><a href="#panel1">Swahili</a></li>
      <li class="tab-title"><a href="#panel2">English</a></li>
    </ul>

    <div class="tabs-content">

	    <?php if($errors->count()): ?>
		    <span class='form_error'><?php echo $errors->first('title_en'); ?></span> <br />
		    <span class='form_error'><?php echo $errors->first('content_en'); ?></span> <br />
		    <span class='form_error'><?php echo $errors->first('photo_url'); ?></span> <br />
		    <span class='form_error'><?php echo $errors->first('position'); ?></span> <br />
			<span class='form_error'><?php echo $errors->first('category_id'); ?></span> 
	    <?php endif; ?>
	    
	    <div class="row collapse">
			<div class="large-12 columns">
				<?php echo Form::label('fullname', 'Person Full name'); ?>

				<?php echo Form::text('fullname'); ?>


				<?php if($errors->first('fullname')): ?>
					<span class='form_error'><?php echo $errors->first('fullname'); ?></span> <br /> 
				<?php endif; ?>
			</div>
		</div>

	    <div class="content active" id="panel1">
			<div class="row collapse">
				<div class="large-12 columns">
					<?php echo Form::label('title', 'Title/Position in english'); ?>

					<?php echo Form::text('title'); ?>

					<?php if($errors->first('title')): ?>
						<span class='form_error'><?php echo $errors->first('title'); ?></span> <br />
					<?php endif; ?>
				</div>
			</div>
			<div class="row collapse">
				<div class="large-12 columns">
					<?php echo Form::label('content', 'Details/Biography in english'); ?>

					<?php echo Form::textarea('content', null, ['id' => 'redactor_sw', 'class' => 'text-area-big']); ?>

					<?php if($errors->first('content')): ?>
						<span class='form_error'><?php echo $errors->first('content'); ?></span> <br />
					<?php endif; ?>
				</div>
			</div>
	    </div>

		<div class="content" id="panel2">
			<div class="row collapse">
				<div class="large-12 columns">
					<?php echo Form::label('title_en', 'Title/Position in Swahili'); ?>

					<?php echo Form::text('title_en'); ?>

				</div>
			</div>
			<div class="row collapse">
				<div class="large-12 columns">
					<?php echo Form::label('content_en', 'Details/Biography in Swahili'); ?>

					<?php echo Form::textarea('content_en', null, ['id' => 'redactor_en', 'class' => 'text-area-big']); ?>

				</div>
			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				<?php echo Form::label('email', 'Email'); ?>

				<?php echo Form::text('email'); ?>

			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				<?php echo Form::label('category_id', 'Select Administration Category'); ?>

				<?php echo Form::select('category_id',$categories,null,[]); ?>

			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				<?php echo Form::label('group_id', 'Select Administration Group'); ?>

				<?php echo Form::select('group_id',$groups,null,[]); ?>

			</div>
		</div>  

		<div class="row collapse">
			<div class="large-12 columns">
				<?php echo Form::label('position', 'Position'); ?>

				<?php echo Form::select('position', array('1' => 'Row 1','2'=>'Row 2','3'=>'Row 3','4'=>'Row 4', '5'=>'Row 5')); ?>

			</div>
		</div>

	    <div class="row collapse">
			<div class="large-12 columns">
				<?php echo Form::label('photo_url', 'Person Profile Photo'); ?>

				<?php echo Form::file('photo_url'); ?>

			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 small-12 medium-12 columns">
				<?php echo Form::submit($submitButton, ['class' => 'custom-button']); ?>

			</div>
		</div>

    </div>

</div>

