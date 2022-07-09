
<?php $__env->startSection('content'); ?>

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">

			<?php if($services->count() == 0): ?>
			
				<div class="content content-large empty-content">
					<div class="empty-text">
						<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
					</div>
				</div>
			<?php else: ?>

				<div class="title">
					Services 
				</div>

				<div class="content content-large">

					<table id="table">
						<thead>
							<tr>
								<th>Service Name</th>
								<th>Status</th>
								<th></th>
							</tr>
						</thead>

						<tbody>

						<?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $services): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td class="show" data-item-value="<?php echo e($services->id); ?>"><?php echo e($services->title_en); ?></td>
								<td class="show" data-item-value="<?php echo e($services->id); ?>"><?php echo e(status($services->active)); ?></td>								
								<td>
									<?php echo link_to_route('cms.services.destroy', "", array($services->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')); ?>

									<a href="<?php echo e(URL::route('cms.services.edit', $services->id)); ?>" class="item-edit">Edit</a>
								</td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>

					<?php echo App\Models\Service::orderBy('id', 'DESC')->paginate(15)->render(); ?>


				</div>
			<?php endif; ?>

		</div>
		
	</div> 
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New services
			</div>

			<div class="content content-large">
				<?php echo Form::open(['route' => 'cms.services.index', 'files' => true]); ?>


					<?php echo $__env->make('cms.services._form', ['submitButton' => "Save"], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				
				<?php echo Form::close(); ?>

			</div>
		</div>
	</div>
	
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('cms.application', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>