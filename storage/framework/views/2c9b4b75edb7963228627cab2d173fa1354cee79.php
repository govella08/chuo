

<!-- setting browser tab title -->
<?php $__env->startSection('title'); ?>
<?php if(isset($content)): ?> 
<?php echo e(__($content->title)); ?>

<?php endif; ?>
<?php $__env->stopSection(); ?>
<!-- ./setting browser tab title -->

<!-- setting page title -->
<?php $__env->startSection('page-title'); ?>
<?php if(isset($content)): ?> 
<?php echo e(__($content->title)); ?>

<?php endif; ?>
<?php $__env->stopSection(); ?>
<!-- ./setting page title -->

<?php $__env->startSection('breadcrumbs-list'); ?>
<li class="breadcrumb-item active">
	<?php if(isset($content)): ?> 
	<?php echo e(__($content->title)); ?>

	<?php endif; ?>
</li>
<?php $__env->stopSection(); ?>


<!-- page content section -->
<?php $__env->startSection('page-content'); ?>

<?php if(isset($content)): ?>
<?php echo nl2br( 
	__($content->content)  
	); ?>

	<?php else: ?>
	<?php echo __('label.no_information'); ?>

	<?php endif; ?>

	<?php $__env->stopSection(); ?>
	<!-- ./page content section -->
















<?php echo $__env->make('site.page-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>