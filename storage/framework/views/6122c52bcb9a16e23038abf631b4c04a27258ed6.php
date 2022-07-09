
<?php $__env->startSection('content'); ?>

<div class="content-panel">
	<div class="title">
		Galleries
	</div>
</div>

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">
			<div class="content content-large">
				

				<?php if($types->count() == 0): ?>
				
				<div class="content content-large empty-content">
					<div class="empty-text">
						<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
					</div>
				</div>
				<?php else: ?>

				<?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $title=>$type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<h4 style="text-transform: capitalize;"><?php echo e($title); ?></h4>
				<table >
					<thead>
						<tr>
							<th>Name</th>
							<th></th>
						</tr>
					</thead>

					<tbody>
						<?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td class="show" data-item-value="<?php echo e($gallery->id); ?>"><?php echo e($gallery->title_en); ?></td>
							<td>
								<?php echo link_to_route('cms.galleries.destroy', "", array($gallery->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')); ?>

								<a href="<?php echo e(URL::route('cms.media.index', $gallery->id)); ?>" class="item-edit">View <?php echo e(ucwords($gallery->type)); ?></a>
								<a href="<?php echo e(URL::route('cms.galleries.edit', $gallery->id)); ?>" class="item-edit">Edit</a>
							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>

			</div> 
		</div>
		
	</div>

	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New Gallery
			</div>

			<div class="content">
				<?php echo Form::open(['route' => 'cms.galleries.index']); ?>


				<?php echo $__env->make('cms.galleries._form', ['submitButton' => "Save"], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				
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