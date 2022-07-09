
<?php $__env->startSection('content'); ?>

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">

			<?php if($administration->count() == 0): ?>
			
			<div class="content content-large empty-content">
				<div class="empty-text">
					<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
				</div>
			</div>
			<?php else: ?>

			<div class="title">
				Administration (Management and Board)   
			</div>

			<div class="content content-large">

				<table id="table">
					<thead>
						<tr>
							<th></th>
							<th>Name</th>
							<th>Category</th>
							<th>Title</th>
							<th>Position</th>
							<th></th>
						</tr>
					</thead>

					<tbody>


						<?php $__currentLoopData = $administration; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td>
								<img src="<?php echo e(url('/uploads/administration/thumb-'.$admin->photo_url)); ?>" style="max-height:100px !important;">
							</td>
							<td class="show" data-item-value="<?php echo e($admin->id); ?>"><?php echo e($admin->fullname); ?></td>
							<td class="show" data-item-value="<?php echo e($admin->id); ?>"><?php echo App\Models\Administration::category_name($admin->category_id); ?></td>
							<td class="show" data-item-value="<?php echo e($admin->id); ?>"><?php echo e($admin->title_en); ?></td>
							<td class="show" data-item-value="<?php echo e($admin->id); ?>"><?php echo e($admin->position); ?></td>
							<td>
								<?php echo link_to_route('cms.administration.destroy', "", array($admin->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')); ?>

								<a href="<?php echo e(URL::route('cms.administration.edit', $admin->id)); ?>" class="item-edit">Edit</a>
							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>

				<?php echo $administration->render(); ?>


			</div>
			<?php endif; ?>

		</div>
		
	</div>
	<?php if(count($categories)): ?>
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New Administration personel
			</div>

			<div class="content content-large">
				<?php echo Form::open(['route' => 'cms.administration.index', 'files' => true]); ?>


				<?php echo $__env->make('cms.administration._form', ['submitButton' => "Save"], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				
				<?php echo Form::close(); ?>

			</div>
		</div>
	</div>
	<?php else: ?>
	<div class="content content-large empty-content">
		<div class="empty-text">
			<span><i class="ion ion-android-checkmark-circle"></i> Please Add Administration Category First</span>
		</div>
	</div>
	<?php endif; ?>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('cms.application', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>