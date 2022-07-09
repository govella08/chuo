

<!-- setting browser tab title -->
<?php $__env->startSection('title'); ?>
  <?php echo e(__('label.announcements', [], $currentLanguage->locale)); ?>

<?php $__env->stopSection(); ?>
<!-- ./setting browser tab title -->

<!-- setting page title -->
<?php $__env->startSection('page-title'); ?>
  <?php echo e(__('label.announcements', [], $currentLanguage->locale)); ?>

<?php $__env->stopSection(); ?>
<!-- ./setting page title -->

<?php $__env->startSection('breadcrumbs-list'); ?>
<li class="breadcrumb-item active"> <?php echo e(__('label.announcements', [], $currentLanguage->locale)); ?> </li>
<?php $__env->stopSection(); ?>


<!-- page content section -->
<?php $__env->startSection('page-content'); ?>
<?php if(count($announcements)): ?>
<?php $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announcement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div>
  <div class="pb-2 more-info">
    <h6 class="mb-1"><?php echo __($announcement->name); ?></h6>
    <p class="mb-2"><?php echo str_limit(__($announcement->content),120); ?>...
      <a href="<?php echo url('announcements/'.$announcement->slug); ?>">
        <?php echo e(__('label.readmore', [], $currentLanguage->locale)); ?>

        <i class="fa fa-arrow-circle-right"></i>
      </a>
    </p>
    <p class="date mb-1">
      <?php echo e(__('label.posted', [], $currentLanguage->locale)); ?>:
      <i class="fa fa-calendar"></i>
      <?php echo date('M d, Y',strtotime($announcement->created_at)); ?>

    </p>
  </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php else: ?>
<?php echo __('label.no_information', [], $currentLanguage->locale); ?>

<?php endif; ?>



<nav aria-label="Page navigation" class="nav-pagination">

  <?php echo $announcements->render(); ?>


</nav>
<?php $__env->stopSection(); ?>
<!-- ./page content section -->
<?php echo $__env->make('site.page-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>