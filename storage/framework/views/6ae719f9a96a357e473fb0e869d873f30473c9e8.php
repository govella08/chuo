
<?php $__env->startSection('content'); ?>

	<?php echo e($errors); ?>

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">

			<?php if($highlights->count() == 0): ?>
			
			<div class="content content-large empty-content">
				<div class="empty-text">
					<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
				</div>
			</div>
			<?php else: ?>

			<div class="title">
				Highlight 
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

						<?php $__currentLoopData = $highlights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $highlight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td class="show" data-item-value="<?php echo e($highlight->id); ?>"><?php echo $highlight->title; ?></td>
							<!-- <td class="show" data-item-value="<?php echo e($highlight->id); ?>"><?php echo $highlight->content_en; ?></td> -->
							<td class="show" data-item-value="<?php echo e($highlight->id); ?>"><?php echo status($highlight->active); ?></td>
							<td>
								<?php echo link_to_route('cms.highlights.destroy', "", array($highlight->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')); ?>

								<a href="<?php echo e(URL::route('cms.highlights.edit', $highlight->id)); ?>" class="item-edit">Edit</a>
							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>

				<?php echo $highlights->render(); ?>


			</div>
			<?php endif; ?>

		</div>
		
	</div>

	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New highlight
			</div>

			<div class="content content-large">
				<?php echo Form::open(['route' => 'cms.highlights.index', 'files' => true]); ?>


				<?php echo $__env->make('cms.highlights._form', ['submitButton' => "Save"], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				
				<?php echo Form::close(); ?>

			</div>
		</div>
	</div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('cms.application', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>