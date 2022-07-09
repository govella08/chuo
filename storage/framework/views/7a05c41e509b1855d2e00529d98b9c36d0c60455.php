
<?php $__env->startSection('content'); ?>

<div class="content-panel">
	<div class="title">
		Staff Email
	</div>
</div>

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">
			<div class="content content-large">
				
				<ul class="accordion" data-accordion>
					<?php if($staffemail): ?>
					<?php echo e($staffemail->url); ?>&nbsp;&nbsp;<a href="<?php echo e(URL::route('cms.staffemail.edit', $staffemail->id)); ?>"><i class="ion-edit"></i>  EDIT</a></a>

					<?php endif; ?>
				</ul>


			</div> 
		</div>
		
	</div>

	<?php if(empty($staffemail)): ?>
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New Staff Email URL
			</div>

			<div class="content">
				<?php echo Form::open(['route' => 'cms.staffemail.index']); ?>


				<?php echo $__env->make('cms.staffemail._form', ['submitButton' => "Save"], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				
				<?php echo Form::close(); ?>

			</div>
		</div>
	</div>
	<?php endif; ?>
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