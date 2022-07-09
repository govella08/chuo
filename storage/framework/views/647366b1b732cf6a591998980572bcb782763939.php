<div class="content">

	<ul class="tabs" data-tab id="myTabs">
		<li class="tab-title active"><a href="#panel1">Swahili</a></li>
		<li class="tab-title"><a href="#panel2">English</a></li>
	</ul>

	<div class="tabs-content">

		<?php if($errors->count()): ?>
		<span class='form_error'><?php echo $errors->first('title_en'); ?></span> <br />
		<span class='form_error'><?php echo $errors->first('title'); ?></span> <br />
		<?php endif; ?>
		

		<div class="content active" id="panel1">
			<div class="row collapse">
				<div class="large-12 columns">
					<?php echo Form::label('title', 'Title in Swahili'); ?>

					<?php echo Form::text('title'); ?>

				</div>
			</div>

			<div class="row collapse">
				<div class="large-12 columns">
					<?php echo Form::label('content', 'Content in Swahili'); ?>

					<?php echo Form::textarea('content', null, ['class' => 'text-area-small']); ?>

				</div>
			</div>


		</div>

		<div class="content" id="panel2">
			
			<div class="row collapse">
				<div class="large-12 columns">
					<?php echo Form::label('title_en', 'Title in english'); ?>

					<?php echo Form::text('title_en'); ?>

				</div>
			</div>

			<div class="row collapse">
				<div class="large-12 columns">
					<?php echo Form::label('content_en', 'Content in english'); ?>

					<?php echo Form::textarea('content_en', null, ['class' => 'text-area-small']); ?>

				</div>
			</div>
			
		</div>
		<div class="row collapse">
			<div class="large-12 columns">
				<?php echo Form::label('active', 'Status'); ?>

				<?php echo Form::select('active', array('1' => 'Active','0'=>'Inactive')); ?>

			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 small-12 medium-12 columns">
				<?php echo Form::submit($submitButton, ['class' => 'custom-button']); ?>

			</div>
		</div>
	</div>

</div>

