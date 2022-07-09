
<?php $__env->startSection('content'); ?>

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">

			<?php if($speeches->count() == 0): ?>
			
			<div class="content content-large empty-content">
				<div class="empty-text">
					<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
				</div>
			</div>
			<?php else: ?>

			<div class="title">
				Speech 
			</div>

			<div class="content content-large">

				<table id="table">
					<thead>
						<tr>
							<th>title</th>
							<!-- <th>content</th> -->
							<th>Status</th>
							<th></th>
						</tr>
					</thead>

					<tbody>

						<?php $__currentLoopData = $speeches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $speech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td class="show" data-item-value="<?php echo e($speech->id); ?>"><?php echo $speech->title; ?></td>
							<!-- <td class="show" data-item-value="<?php echo e($speech->id); ?>"><?php echo $speech->content_en; ?></td> -->								
							<td class="show" data-item-value="<?php echo e($speech->id); ?>"><?php echo status($speech->active); ?></td>								
							<td>
								<?php echo link_to_route('cms.speeches.destroy', "", array($speech->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')); ?>

								<a href="<?php echo e(URL::route('cms.speeches.edit', $speech->id)); ?>" class="item-edit">Edit</a>
							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>

				<?php echo $speeches->render(); ?>


			</div>
			<?php endif; ?>

		</div>
		
	</div>

	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New speech
			</div>

			<div class="content content-large">
				<?php echo Form::open(['route' => 'cms.speeches.index', 'files' => true]); ?>


				<?php echo $__env->make('cms.speeches._form', ['submitButton' => "Save"], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				
				<?php echo Form::close(); ?>

			</div>
		</div>
	</div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('cms.application', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>