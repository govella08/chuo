
<?php $__env->startSection('content'); ?>

<div class="row collapse">
<div class="large-7 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Biography
			</div>

			<div class="content">
				<?php echo Form::model($biography, ['route' => ['cms.biography.update', $biography->id], 'files' => true, 'method' => 'PATCH']); ?>


					<?php echo $__env->make('cms.biographies._form', ['submitButton' => "Save"], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				
				<?php echo Form::close(); ?>

			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('cms.application', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>