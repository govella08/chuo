
<?php $__env->startSection('content'); ?>

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">

			<?php if($levels->count() == 0): ?>
			
				<div class="content content-large empty-content">
					<div class="empty-text">
						<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
					</div>
				</div>
			<?php else: ?>

				<div class="title">
					Levels
				</div>

				<div class="content content-large">

					<table id="table">
						<thead>
							<tr>
								<th>Name</th>
								<th width="30%"></th>
							</tr>
						</thead>

						<tbody>

						<?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td class="show" data-item-value="<?php echo e($level->id); ?>"><strong><?php echo e(__($level->name)); ?></strong></td>
								<td>
									<?php echo link_to_route('cms.levels.destroy', "", array($level->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')); ?>

									<a href="<?php echo e(URL::route('cms.levels.edit', $level->id)); ?>" class="item-edit">Edit</a>
								</td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>

					<?php echo $levels->render(); ?>


				</div>
			<?php endif; ?>

		</div>
		
	</div>

	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Level Create Form
			</div>

			<div class="content content-large">
				<?php echo Form::open(['route' => 'cms.levels.index', 'files' => true]); ?>


					<?php echo $__env->make('cms.levels._form', ['submitButton' => "Save"], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				
				<?php echo Form::close(); ?>

			</div>
		</div>
	</div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('cms.application', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>