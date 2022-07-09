
<?php $__env->startSection('content'); ?>

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">

			<?php if($publications->count() == 0): ?>
			
			<div class="content content-large empty-content">
				<div class="empty-text">
					<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
				</div>
			</div>
			<?php else: ?>

			<div class="title">
				Publication 
			</div>

			<div class="content content-large">

				<table id="table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Category</th>
							<th>Status</th>
							<th>Published Date</th>
							<th></th>
						</tr>
					</thead>

					<tbody>

						<?php $__currentLoopData = $publications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $publication): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td class="show" data-item-value="<?php echo e($publication->id); ?>"><?php echo e($publication->title_en); ?></td>
							<td class="show" data-item-value="<?php echo e($publication->id); ?>"><?php echo e($publication->category->title_en); ?></td>
							<td class="show" data-item-value="<?php echo e($publication->id); ?>"><?php echo e(status($publication->active)); ?></td>
							<td class="show" data-item-value="<?php echo e($publication->id); ?>"><?php echo e($publication->published_date); ?></td>
							<td>
								<?php echo link_to_route('cms.publications.destroy', "", array($publication->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')); ?>

								<a href="<?php echo e(URL::route('cms.publications.edit', $publication->id)); ?>" class="item-edit">Edit</a>
							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>

				<?php echo $publications->render(); ?>


			</div>
			<?php endif; ?>

		</div>
		
	</div>
	<?php if(count($categories)): ?>
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New publication
			</div>

			<div class="content content-large">
				<?php echo Form::open(['route' => 'cms.publications.index', 'files' => true]); ?>


				<?php echo $__env->make('cms.publications._form', ['submitButton' => "Save"], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				
				<?php echo Form::close(); ?>

			</div>
		</div>
	</div>
	<?php else: ?>
	<div class="content content-large empty-content">
		<div class="empty-text">
			<span><i class="ion ion-android-checkmark-circle"></i> Please Add Publication Category First</span>
		</div>
	</div>
	<?php endif; ?>

</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('cms.application', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>