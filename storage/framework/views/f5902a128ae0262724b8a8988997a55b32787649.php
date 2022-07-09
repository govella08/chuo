
<?php $__env->startSection('content'); ?>

<div class="content-panel">
	<div class="title">
		<?php echo e($gallery->type); ?> for "<?php echo e($gallery->title_en); ?>" Gallery (<a href="<?php echo e(route('cms.galleries.index')); ?>">Back to galleries</a>) 
	</div>
</div>

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">

			
			<div class="content content-large">
				
				<ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-5   admin-video-gallery">
					<?php $flag  = true; ?>
					<?php $__currentLoopData = $gallery->{$gallery->type}; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $med): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php $flag  = false; ?>
					<li>
						<?php if($gallery->type=='photos'): ?>
						<img src="<?php echo e(asset($med->image('thumb'))); ?>">
						<?php endif; ?>
						<?php if($gallery->type=='videos'): ?>

						<iframe src="https://www.youtube.com/embed/<?php echo utube_hash($med->url); ?>" width="190" height="170" frameborder="2"   allowfullscreen></iframe>
						
						<?php endif; ?>
						<div>
							<div>

								<a href="<?php echo e(URL::route('cms.media.edit', $med->id)); ?>"><i class="ion-edit"></i>  EDIT</a> | 
								<a href="<?php echo e(URL::route('cms.media.destroy', $med->id)); ?>" data-method='delete', data-confirm='Are you Sure?'><i class="ion-android-delete"></i>DELETE</a>

							</div>
						</div>
						
					</li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>

				<?php if(!$flag): ?>
				<div class="content content-large empty-content">
					<div class="empty-text">
						<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
					</div>
				</div>

				<?php endif; ?>


			</div> 





		</div>
		
	</div>

	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New 
			</div>

			<div class="content">
				<?php echo Form::model($media,['files'=>true,'route' => 'cms.media.store']); ?>

				<?php echo Form::hidden('gallery_id'); ?>

				<?php echo Form::hidden('type',$gallery->type); ?>

				<?php echo $__env->make('cms.media.'.$gallery->type.'_form', ['submitButton' => "Save"], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				
				<?php echo Form::close(); ?>

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('cms.application', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>