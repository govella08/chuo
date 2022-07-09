

<!-- setting browser tab title -->
<?php $__env->startSection('title'); ?>
<?php echo __('label.projects', [], $currentLanguage->locale); ?>

<?php $__env->stopSection(); ?>
<!-- ./setting browser tab title -->

<!-- setting page title -->
<?php $__env->startSection('page-title'); ?>
<?php echo __($project->title, [], $currentLanguage->locale); ?>

<?php $__env->stopSection(); ?>
<!-- ./setting page title -->

<?php $__env->startSection('breadcrumbs-list'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(url('projects',$project->category_id)); ?>"><?php echo e(__('label.projects', [], $currentLanguage->locale)); ?></a></li>
<li class="breadcrumb-item active"><?php echo __($project->title, [], $currentLanguage->locale); ?></li>
<?php $__env->stopSection(); ?>


<!-- page content section -->
<?php $__env->startSection('page-content'); ?>
<p class="download">
	<a href="<?php echo e(asset(__($project->file))); ?>" download><i class="fa fa-file-pdf"></i> <?php echo e(__('label.download_attachment')); ?></a>
</p>
<?php echo __($project->content); ?>

<?php $__env->stopSection(); ?>
<!-- ./page content section -->
<?php echo $__env->make('site.page-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>