
<?php $__env->startSection('content'); ?>

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">

			<?php if($news_list->count() == 0): ?>
			
				<div class="content content-large empty-content">
					<div class="empty-text">
						<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
					</div>
				</div>
			<?php else: ?>

				<div class="title">
					News
				</div>

				<div class="content content-large">

					<table id="table">
						<thead>
							<tr>
								<th width="15%">Photo</th>
								<th>Details</th>
								<th>Status</th>
								<th width="15%"></th>
							</tr>
						</thead>

						<tbody>

						<?php $__currentLoopData = $news_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td>
									<img src="<?php echo e(url('/uploads/news/thumb-'.$news->photo_url)); ?>" style="max-height:100px !important;">
								</td>
								<td class="show" data-item-value="<?php echo e($news->id); ?>"><strong><?php echo e(__($news->title_translation)); ?></strong></td>
								<td class="show" data-item-value="<?php echo e($news->id); ?>"><strong><?php echo e($news->active); ?></strong><br/></td>
								<td>
									<?php echo link_to_route('cms.news.destroy', "", array($news->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')); ?>

									<a href="<?php echo e(URL::route('cms.news.edit', $news->id)); ?>" class="item-edit">Edit</a>
								</td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>

					<?php echo $news_list->render(); ?>


				</div>
			<?php endif; ?>

		</div>
		
	</div>

	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				News Create Form
			</div>

			<div class="content content-large">
				<?php echo Form::open(['route' => 'cms.news.index', 'files' => true]); ?>


					<?php echo $__env->make('cms.news._form', ['submitButton' => "Save"], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				
				<?php echo Form::close(); ?>

			</div>
		</div>
	</div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('cms.application', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>