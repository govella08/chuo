
<?php $__env->startSection('content'); ?>

<div class="content-panel">
    <div class="title">
		Campus
    </div>
</div>

<div class="row collapse">
	
	<div class="large-12 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Update <?php echo e($campuses->name_en); ?>

			</div>

			<div class="content">
				<div class="row">
					<div class="large-8 columns">
						<?php echo Form::model($campuses, ['route' => ['cms.campuses.update', $campuses->id], 'method' => 'PATCH']); ?>


							<?php echo $__env->make('cms.campuses._form', ['submitButton' => "Update"], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						
						<?php echo Form::close(); ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('cms.application', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>