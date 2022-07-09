
<?php $__env->startSection('content'); ?>

<div class="content-panel">
    <div class="title">
        Biography
    </div>
</div>

<div class="row collapse">

	<div class="large-12 medium-12 small-12 columns">
		
		<div class="content-panel">
		    <div class="content content-large">
		    
		    <?php if($biography): ?>
				<ul class="large-12 medium-12 small-12 columns">

					<li class="row">
						<p>
							<a href="<?php echo e(URL::route('cms.biography.edit', $biography->id)); ?>" class="">Edit Profile</a>
						</p>
						<p><img style="width: 200px;height: 200px;" src="<?php echo e(asset($biography->photo_url)); ?>" />
							<?php echo Form::open(['files'=>true, 'route' => ['cms.biography.photo',$biography->id]]); ?>

								<span class='form_error'><?php echo $errors->first('photourl'); ?></span>
								<?php echo Form::label('photourl', 'Preferred size 600 x 745'); ?>

								<?php echo Form::file('photourl'); ?>



								<?php echo Form::submit('Change', ['class' => 'custom-button']); ?>

							<?php echo Form::close(); ?>


						</p>
						<p><b>Name</b> <?php echo e($biography->name); ?> </p>

						<b>Salutation</b>
						<p>English <?php echo e(__($biography->salutation_translation,[],'en')); ?> </p>
						<p>Swahili <?php echo e($biography->salutation); ?></p>

						<b>Title</b>
						<p>English <?php echo e($biography->title_en); ?></p>
						<p>Swahili <?php echo e($biography->title); ?></p>

					</li>

					<li>
						<h4>English</h4>
						<?php echo __($biography->content_translation,[],'en'); ?>

					</li>

					<li>
						<h4>Swahili</h4>
						<?php echo $biography->content; ?>

					</li>
				</ul>
			<?php endif; ?>
		    </div> 
		  
		</div>
		
	</div>

	
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<script type="text/javascript">
		$(document).ready(function(){
		    $(document).foundation();
		});
	</script>
	<link rel="stylesheet" href="<?php echo e(asset('cms/cropper/dist/cropper.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('cms.application', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>