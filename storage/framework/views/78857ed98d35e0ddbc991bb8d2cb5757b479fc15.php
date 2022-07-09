

<!-- setting browser tab title -->
<?php $__env->startSection('title'); ?>
  <?php echo __('label.events', [], $currentLanguage->locale); ?>

<?php $__env->stopSection(); ?>
<!-- ./setting browser tab title -->

<!-- setting page title -->
<?php $__env->startSection('page-title'); ?>
<?php echo __('label.events', [], $currentLanguage->locale); ?>

<?php $__env->stopSection(); ?>
<!-- ./setting page title -->

<?php $__env->startSection('breadcrumbs-list'); ?>
<li class="breadcrumb-item active"><?php echo __('label.events', [], $currentLanguage->locale); ?></li>
<?php $__env->stopSection(); ?>


<!-- page content section -->
<?php $__env->startSection('page-content'); ?>
<div class="events">

  <?php $__empty_1 = true; $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
  <div class="more-info mb-3">
    <h6 class="mb-1"><?php echo __($event->title_translation); ?></h6>
    <p class="card-text mb-2">
      <?php echo str_limit($event->{langdb('description')},200); ?>

      <a href="<?php echo URL::to('events', $event->slug); ?>"><?php echo e(__('label.readmore', [], $currentLanguage->locale)); ?> <i class="fa fa-arrow-circle-right"></i></a>
    </p>
    <div class="clearfix mb-1">
      <span class="date float-right"><i class="fa fa-calendar"></i><?php echo e(date('d', strToTime($event->start_date))); ?><sup><?php echo e(date('S', strToTime($event->start_date))); ?></sup> <?php echo e(date('M Y', strToTime($event->start_date))); ?></span>
      <span class="date float-left"><i class="fa fa-map-marker"></i> <?php echo e($event->location); ?></span>
    </div>
  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
  <?php echo e(__('label.no_information', [], $currentLanguage->locale)); ?>

  <?php endif; ?>

</div>
<?php $__env->stopSection(); ?>
<!-- ./page content section -->
<?php echo $__env->make('site.page-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>