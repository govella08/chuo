
<?php $__env->startSection('content'); ?>

<div class="content-panel">
	<div class="title">
		Announcement
	</div>
</div>

<div class="row collapse">
	
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Edit <?php echo e($announcement->title_en); ?>

			</div>

			<div class="content">
				<?php echo Form::model($announcement, ['route' => ['cms.announcements.update', $announcement->id], 'files' => true, 'method' => 'PATCH']); ?>


				<?php echo $__env->make('cms.announcements._form', ['submitButton' => "Update"], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				
				<?php echo Form::close(); ?>

			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('cms.application', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>