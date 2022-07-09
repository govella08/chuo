
<?php $__env->startSection('content'); ?>

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">

			<?php if($events->count() == 0): ?>
			
				<div class="content content-large empty-content">
					<div class="empty-text">
						<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
					</div>
				</div>
			<?php else: ?>

				<div class="title">
					events
				</div>

				<div class="content content-large">

					<table>
						<thead>
							<tr>
								<th>Title</th>
								<th></th>
							</tr>
						</thead>

						<tbody>

						<?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td class="show" data-item-value="<?php echo e($event->id); ?>"><?php echo e($event->title); ?></td>
								<td>
									<?php echo link_to_route('cms.events.destroy', "", array($event->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')); ?>

									<a href="<?php echo e(URL::route('cms.events.edit', $event->id)); ?>" class="item-edit">Edit</a>
								</td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>

					<?php echo $events->render(); ?>


				</div>
			<?php endif; ?>

		</div>
		
	</div>

	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New event
			</div>

			<div class="content content-large">
				<?php echo Form::open(['route' => 'cms.events.index', 'files' => true]); ?>


					<?php echo $__env->make('cms.events._form', ['submitButton' => "Save"], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				
				<?php echo Form::close(); ?>

			</div>
		</div>
	</div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('cms.application', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>