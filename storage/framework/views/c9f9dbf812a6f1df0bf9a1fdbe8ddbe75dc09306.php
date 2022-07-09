
<?php $__env->startSection('content'); ?>

<div class="content-panel">
	<div class="title">
		Faqs
	</div>
</div>

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">
			<div class="content content-large">
				
				<ul class="accordion" data-accordion>
					<?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li class="accordion-navigation">
						<a href="#panel<?php echo e($faq->id); ?>"><?php echo e($index + 1); ?>. <?php echo e($faq->question_en); ?></a>
						<div id="panel<?php echo e($faq->id); ?>" class="content <?php echo e($index == 0 ? 'active' : ''); ?>">
							<?php echo nl2br($faq->answer_en); ?>


							<div>
								<a href="<?php echo e(URL::route('cms.faqs.edit', $faq->id)); ?>"><i class="ion-edit"></i>  EDIT</a> | <a href="<?php echo e(URL::route('cms.faqs.destroy', $faq->id)); ?>" data-method='delete', data-confirm='Are you Sure?'><i class="ion-android-delete"></i>  DELETE</a>
							</div>
						</div>
						
					</li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>


			</div> 
		</div>
		
	</div>

	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New company
			</div>

			<div class="content">
				<?php echo Form::open(['route' => 'cms.faqs.index']); ?>


				<?php echo $__env->make('cms.faqs._form', ['submitButton' => "Save"], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				
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