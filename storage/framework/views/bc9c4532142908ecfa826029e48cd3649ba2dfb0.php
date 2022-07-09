

<!-- setting browser tab title -->
<?php $__env->startSection('title'); ?>
<?php echo __('label.announcements', [], $currentLanguage->locale); ?>

<?php $__env->stopSection(); ?>
<!-- ./setting browser tab title -->

<!-- setting page title -->
<?php $__env->startSection('page-title'); ?>
<?php echo __('label.announcements', [], $currentLanguage->locale); ?>

<?php $__env->stopSection(); ?>
<!-- ./setting page title -->

<?php $__env->startSection('breadcrumbs-list'); ?>
<li class="breadcrumb-item active"><a href="<?php echo e(url('announcements')); ?>"><?php echo __('label.announcements', [], $currentLanguage->locale); ?></a></li>
<?php $__env->stopSection(); ?>


<!-- page content section -->
<?php $__env->startSection('page-content'); ?>

<?php if($announcement): ?>
<div>
	<p class="date float-right mb-1"><?php echo e(__('label.posted', [], $currentLanguage->locale)); ?>: <i class="fa fa-calendar"></i> <?php echo date('M d, Y',strtotime($announcement->created_at)); ?></p>
</div><br>
<div class="news-content">
	<?php echo __($announcement->content_translation); ?>

</div>
</div>

<?php else: ?>
<?php echo __('label.no_information', [], $currentLanguage->locale); ?>

<?php endif; ?>

<?php $__env->stopSection(); ?>
<!-- ./page content section -->
<?php echo $__env->make('site.page-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>