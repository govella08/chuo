

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
<li class="breadcrumb-item active" aria-current="page"><?php echo e(__('label.news', [], $currentLanguage->locale)); ?></li>
<?php $__env->stopSection(); ?>


<!-- page content section -->
<?php $__env->startSection('page-content'); ?>

<?php if(count($alumnis)): ?>
<?php $__currentLoopData = $alumnis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alumni): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="row border-bottom">
    <div class="col-md-3">
        <img src="<?php echo e(asset('/uploads/alumni/medium-'.$alumni->photo_url)); ?>" class="img-thumbnail" alt=" eGA Photo">
    </div>
    <div class="col-md-9">
        <div class="mt-3 mt-md-0">
            <h6 class="mb-1"><span class="badge badge-info">Name: <?php echo e($alumni->fullname); ?></span>
            </h6>
            <p class="mb-1"><?php echo $alumni->alumni; ?><a class="text-nowrap read-more"
                    href="<?php echo e(url('alumni',$alumni->slugy)); ?>">Read
                    More</a></p>
            <p class="date">Posted on: <i class="fas fa-calendar-alt"></i> January 23, 2016
            </p>
        </div>
    </div>
</div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
    <?php echo e(label('lbl_no_information')); ?>


    <?php endif; ?>

    
    <?php $__env->stopSection(); ?>
    <!-- ./page content section -->






















<?php echo $__env->make('site.page-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>