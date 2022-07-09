
<?php $__env->startSection('content'); ?>

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">

			<?php if($campuses->count() == 0): ?>
			
				<div class="content content-large empty-content">
					<div class="empty-text">
						<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
					</div>
				</div>
			<?php else: ?>

				<div class="title">
					Academic Campuses
				</div>

				<div class="content content-large">

					<table id="table">
						<thead>
							<tr>
								<th width="15%">Name</th>
								<th>Summary</th>
								<th width="15%"></th>
							</tr>
						</thead>

						<tbody>

						<?php $__currentLoopData = $campuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td class="show" data-item-value="<?php echo e($campus->id); ?>"><strong><?php echo e(__($campus->name_translation)); ?></strong></td>
								<td class="show" data-item-value="<?php echo e($campus->id); ?>"><strong><?php echo e(__($campus->summary_translation)); ?></strong><br/></td>
								<td>
									<?php echo link_to_route('cms.campuses.destroy', "", array($campus->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')); ?>

									<a href="<?php echo e(URL::route('cms.campuses.edit', $campus->id)); ?>" class="item-edit">Edit</a>
								</td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>

					<?php echo $campuses->render(); ?>


				</div>
			<?php endif; ?>

		</div>
		
	</div>

	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Campus Create Form
			</div>

			<div class="content content-large">
				<?php echo Form::open(['route' => 'cms.campuses.index']); ?>


					<?php echo $__env->make('cms.campuses._form', ['submitButton' => "Save"], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				
				<?php echo Form::close(); ?>

			</div>
		</div>
	</div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('cms.application', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>