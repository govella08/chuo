
<?php $__env->startSection('content'); ?>

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">

			<?php if($links->count() == 0): ?>
			
			<div class="content content-large empty-content">
				<div class="empty-text">
					<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
				</div>
			</div>
			<?php else: ?>

			<div class="title">
				Related Links
			</div>

			<div class="content content-large">

				<table>
					<thead>
						<tr>
							<th>Title</th>
							<th>URL</th>
							<th></th>
						</tr>
					</thead>

					<tbody>

						<?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td class="show" data-item-value="<?php echo e($link->id); ?>"><?php echo e($link->title_en); ?></td>
							<td class="show" data-item-value="<?php echo e($link->id); ?>">
								<a href="<?php echo e(URL::to($link->url)); ?>"><?php echo e($link->url); ?></a>
							</td>
							<td>
								<?php echo link_to_route('cms.related_links.destroy', "", array($link->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')); ?>

								<a href="<?php echo e(URL::route('cms.related_links.edit', $link->id)); ?>" class="item-edit">Edit</a>
							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
			</div>
			<?php endif; ?>

		</div>
		
	</div>

	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New Related Link
			</div>

			<div class="content content-large">
				<?php echo Form::open(['route' => 'cms.related_links.index']); ?>


				<?php echo $__env->make('cms.related_links._form', ['submitButton' => "Save"], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				
				<?php echo Form::close(); ?>

			</div>
		</div>
	</div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('cms.application', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>