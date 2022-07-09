<?php if(count($list) > 0): ?>
<ul class="list-unstyled">
	<?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<li class="download mb-4 d-flex align-items-center">
		<span class="d-flex"><i class="mr-2 pt-1 far fa-file-pdf"></i><?php echo __($data->title_translation); ?></span>
		<a class="btn btn-custom ml-auto btn-sm  flex-shrink-0" target="blank" href="<?php echo asset(__($data->file)); ?>"><i class="fa fa-download"></i><?php echo e(__('label.download', [], $currentLanguage->locale)); ?></a>
	</li>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>

<div class="pagination"><?php echo $list->render(); ?></div>
<?php else: ?> 
<div class="alert alert-warning"> <?php echo __('label.no_information', [], $currentLanguage->locale); ?></div>
<?php endif; ?>