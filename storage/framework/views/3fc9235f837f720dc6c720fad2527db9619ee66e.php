
<?php $__env->startSection('content'); ?>

<div class="row collapse">
	<div class="large-12 medium-12 small-12 columns">
		
		<div class="content-panel">

			<?php if($settings->count() == 0): ?>
			
			<div class="content content-large empty-content">
				<div class="empty-text">
					<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
				</div>
			</div>
			<?php else: ?>

			<div class="title">
				Content Setting & Analytics
			</div>

			<div class="content content-large">

				<div class="row">
					<div class="large-7 columns">
						<table>
							<thead>
								<tr>
									<th>Name</th>
									<th></th>
								</tr>
							</thead>

							<tbody>

								<?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td><?php echo e($setting->title_en); ?></td>
									<td>
										<a href="<?php echo e(URL::route('cms.settings.edit', $setting->id)); ?>" class="item-edit">Update</a>
									</td>
								</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
						</table>
					</div>	
				</div>

			</div>
			<?php endif; ?>

		</div>
		
	</div>
<!-- 
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New settings
			</div>

			<div class="content content-large">
				<?php echo Form::open(['route' => 'cms.settings.index', 'files' => true]); ?>


					<?php echo $__env->make('cms.settings._form', ['submitButton' => "Save"], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				
				<?php echo Form::close(); ?>

			</div>
		</div>
	</div> -->

</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('cms.application', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>