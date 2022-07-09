

<!-- setting browser tab title -->
<?php $__env->startSection('title'); ?>
<?php echo __($page->title); ?>


<?php $__env->stopSection(); ?>
<!-- ./setting browser tab title -->

<!-- setting page title -->
<?php $__env->startSection('page-title'); ?>
<?php echo __($page->title); ?>

<?php $__env->stopSection(); ?>
<!-- ./setting page title -->

<?php $__env->startSection('breadcrumbs-list'); ?>
<li class="breadcrumb-item active"><?php echo __($page->title); ?></li>
<?php $__env->stopSection(); ?>


<!-- page content section -->
<?php $__env->startSection('page-content'); ?>
<?php if(isset($page)): ?>
<?php echo __($page->content); ?>

<?php else: ?>
<?php echo __('label.no_information'); ?>

<?php endif; ?>
<?php $__env->stopSection(); ?>
<!-- ./page content section -->




















<?php echo $__env->make('site.page-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>