

<!-- setting browser tab title -->
<?php $__env->startSection('title'); ?>
	<?php echo e(__('label.management', [], $currentLanguage->locale)); ?>

<?php $__env->stopSection(); ?>
<!-- ./setting browser tab title -->

<!-- setting page title -->
<?php $__env->startSection('page-title'); ?>
	<?php echo e(__('label.management', [], $currentLanguage->locale)); ?>

<?php $__env->stopSection(); ?>
<!-- ./setting page title -->

<?php $__env->startSection('breadcrumbs-list'); ?>
<li class="breadcrumb-item"><?php echo e(__('label.administration', [], $currentLanguage->locale)); ?></li>
<li class="breadcrumb-item"><a href="<?php echo e(url('administration',$category->id)); ?>"><?php echo e(__('label.management', [], $currentLanguage->locale)); ?></a></li>
<li class="breadcrumb-item active"><?php echo $administration->fullname; ?></li>
<?php $__env->stopSection(); ?>



<!-- page content section -->
<?php $__env->startSection('page-content'); ?>
<img src="<?php echo e(url('/uploads/administration/medium-'.$administration->photo_url)); ?>" alt="News Image" class="img-responsive">
<span class="date"> <i class="icon icon-calendar"></i><strong><?php echo date('M, d Y', strtotime($administration->created_at)); ?></strong></span>
<p><?php echo $administration->content_translation; ?></p>
<?php $__env->stopSection(); ?>
<!-- ./page content section -->
<?php echo $__env->make('site.page-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>