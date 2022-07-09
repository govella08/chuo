
<?php $__env->startSection('content'); ?>

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">

			<?php if($alumnis->count() == 0): ?>
			
			<div class="content content-large empty-content">
				<div class="empty-text">
					<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
				</div>
			</div>
			<?php else: ?>

			<div class="title">
				Alumni
			</div>

			<div class="content content-large">

				<table id="table">
					<thead>
						<tr>
							<th></th>
							<th>Name</th>
							<th>Title</th>
							<th>Alumni</th>
							<th></th>
						</tr>
					</thead>

					<tbody>


						<?php $__currentLoopData = $alumnis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alumni): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td>
								<img src="<?php echo e(url('/uploads/alumni/thumb-'.$alumni->photo_url)); ?>" style="max-height:100px !important;">
							</td>
							<td class="show" data-item-value="<?php echo e($alumni->id); ?>"><?php echo e($alumni->fullname); ?></td>
							<td class="show" data-item-value="<?php echo e($alumni->id); ?>"><?php echo e($alumni->title_en); ?></td>
							<td class="show" data-item-value="<?php echo e($alumni->id); ?>"><?php echo $alumni->alumni; ?></td>
							<td>
								<?php echo link_to_route('cms.alumni.destroy', "", array($alumni->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')); ?>

								<a href="<?php echo e(URL::route('cms.alumni.edit', $alumni->id)); ?>" class="item-edit">Edit</a>
							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>

				<?php echo $alumnis->render(); ?>


			</div>
			<?php endif; ?>

		</div>
		
	</div>

	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New Alumni personel
			</div>

			<div class="content content-large">
				<?php echo Form::open(['route' => 'cms.alumni.index', 'files' => true]); ?>


					<?php echo $__env->make('cms.alumni._form', ['submitButton' => "Save"], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				
				<?php echo Form::close(); ?>

			</div>
		</div>
	</div>
	
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('cms.application', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>