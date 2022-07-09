
<?php $__env->startSection('content'); ?>

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">

			<?php if($programmes->count() == 0): ?>
			
			<div class="content content-large empty-content">
				<div class="empty-text">
					<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
				</div>
			</div>
			<?php else: ?>

			<div class="title">
				Programmes   
			</div>

			<div class="content content-large">

				<table id="table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Level</th>
							<th></th>
						</tr>
					</thead>

					<tbody>


						<?php $__currentLoopData = $programmes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $programme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td class="show" data-item-value="<?php echo e($programme->id); ?>"><?php echo e($programme->name); ?></td>
							<td class="show" data-item-value="<?php echo e($programme->id); ?>"><?php echo App\Models\Programmes::level_name($programme->level_id); ?></td>
							<td>
								<?php echo link_to_route('cms.programmes.destroy', "", array($programme->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')); ?>

								<a href="<?php echo e(URL::route('cms.programmes.edit', $programme->id)); ?>" class="item-edit">Edit</a>
							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>

				<?php echo $programmes->render(); ?>


			</div>
			<?php endif; ?>

		</div>
		
	</div>
	<?php if(count($levels)): ?>
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New Programme
			</div>

			<div class="content content-large">
				<?php echo Form::open(['route' => 'cms.programmes.index']); ?>


				<?php echo $__env->make('cms.programmes._form', ['submitButton' => "Save"], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				
				<?php echo Form::close(); ?>

			</div>
		</div>
	</div>
	<?php else: ?>
	<div class="content content-large empty-content">
		<div class="empty-text">
			<span><i class="ion ion-android-checkmark-circle"></i> Please Add Programme Levels First</span>
		</div>
	</div>
	<?php endif; ?>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('cms.application', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>