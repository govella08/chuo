
<?php $__env->startSection('content'); ?>

<div class="content-panel">
	<div class="title">
		Page Categories
	</div>
</div>

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">
			<div class="content content-large">
				




				

				<?php if($categories->count() == 0): ?>
				
				<div class="content content-large empty-content">
					<div class="empty-text">
						<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
					</div>
				</div>
				<?php else: ?>

				<table>
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th></th>
						</tr>
					</thead>

					<tbody>

						<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($index+1); ?>

								<td class="show" data-item-value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></td>
								<td>
									<?php echo link_to_route('cms.page-categories.destroy', "", array($category->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')); ?>

									<a href="<?php echo e(URL::route('cms.page-categories.edit', $category->id)); ?>" class="item-edit">Edit</a>
								</td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
					<?php endif; ?>


					<?php echo $categories->render(); ?>



				</div> 
			</div>
			
		</div>

		<div class="large-6 columns medium-12 small-12 columns">
			<div class="content-panel">
				<div class="title">
					New Page category
				</div>

				<div class="content">
					<?php echo Form::open(['route' => 'cms.page-categories.index']); ?>


					<?php echo $__env->make('cms.page_categories._form', ['submitButton' => "Save"], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					
					<?php echo Form::close(); ?>

				</div>
			</div>
		</div>
	</div>


	<?php $__env->stopSection(); ?>

	<?php $__env->startSection('scripts'); ?>
	<script type="text/javascript">
		$(document).ready(function(){
			$(document).foundation();
		});
	</script>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('cms.application', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>