

<!-- setting browser tab title -->
<?php $__env->startSection('title'); ?>
	<?php echo __('label.speeches', [], $currentLanguage->locale); ?>

<?php $__env->stopSection(); ?>
<!-- ./setting browser tab title -->

<!-- setting page title -->
<?php $__env->startSection('page-title'); ?>
	<?php echo __('label.speeches', [], $currentLanguage->locale); ?>

<?php $__env->stopSection(); ?>
<!-- ./setting page title -->

<?php $__env->startSection('breadcrumbs-list'); ?>
<li class="breadcrumb-item active"> <?php echo __('label.speeches', [], $currentLanguage->locale); ?> </li>
<?php $__env->stopSection(); ?>


<!-- page content section -->
<?php $__env->startSection('page-content'); ?>
<div class="publication">
  <?php echo $__env->make('site.includes._publications',$list = $speeches, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<?php $__env->stopSection(); ?>
<!-- ./page content section -->



<?php echo $__env->make('site.page-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>