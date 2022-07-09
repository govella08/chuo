<!-- setting browser tab title -->
<?php $__env->startSection('title'); ?>
<?php echo e(__('label.news', [], $currentLanguage->locale)); ?>

<?php $__env->stopSection(); ?>
<!-- ./setting browser tab title -->

<!-- setting page title -->
<?php $__env->startSection('page-title'); ?>
<?php echo e(__('label.news', [], $currentLanguage->locale)); ?>

<?php $__env->stopSection(); ?>
<!-- ./setting page title -->

<?php $__env->startSection('breadcrumbs-list'); ?>
	<li class="breadcrumb-item active" aria-current="page"> <?php echo e(__('label.news', [], $currentLanguage->locale)); ?></li>
	<li class="breadcrumb-item active" aria-current="page"> <?php echo e(__($news->title_translation)); ?> </li>
<?php $__env->stopSection(); ?>


<!-- page content section -->
<?php $__env->startSection('page-content'); ?>

<div class="date clearfix mb-2">
    <span class="float-right">
        <?php echo e(__('label.posted', [], $currentLanguage->locale)); ?>:
        <i class="fa fa-calendar"></i>
        <?php echo date('M, d Y', strtotime($news->created_at)); ?>

    </span>
</div>
<h4 class="text-center"><?php echo e(__($news->title_translation)); ?></h4>

<div class="news-content mt-4 pt-3 border-top">
    <p><?php echo __($news->content_translation); ?></p>
</div>


<?php $__env->stopSection(); ?>
<!-- ./page content section -->

<?php echo $__env->make('site.page-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>