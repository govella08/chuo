

<!-- setting browser tab title -->
<?php $__env->startSection('title'); ?>
<?php echo __('label.our_services', [], $currentLanguage->locale); ?>

<?php $__env->stopSection(); ?>
<!-- ./setting browser tab title -->

<!-- setting page title -->
<?php $__env->startSection('page-title'); ?>
<?php echo __('label.our_services', [], $currentLanguage->locale); ?>

<?php $__env->stopSection(); ?>
<!-- ./setting page title -->

<?php $__env->startSection('breadcrumbs-list'); ?>
<li class="breadcrumb-item active"><?php echo __('label.our_services', [], $currentLanguage->locale); ?></li>
<?php $__env->stopSection(); ?>


<!-- page content section -->
<?php $__env->startSection('page-content'); ?>
<?php if(count($services)): ?>
<?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="row pb-2 more-info">
    <div class="col-md-4">
        <div class="text-center">
            <img src="<?php echo asset('uploads/services/thumb-'.$service->photo_url); ?>" alt="" class="img-fluid mb-1 img-thumbnail">
        </div>
    </div>
    <div class="col-md-8">
        <div class="">
            <h6 class="mb-1"><?php echo __($service->title_translation); ?></h6>
            <p class="mb-2">
                <?php echo __($service->summary_translation); ?>...
                <a href="<?php echo URL::to('services', $service->slug); ?>"><?php echo e(__('label.readmore', [], $currentLanguage->locale)); ?> <i class="fa fa-arrow-circle-right"></i></a></p>

            </div>
        </div>
    </div>
    <hr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <!-- render pagination -->

    <div class="text-right">
        <!-- $services->render() -->
    </div>
    <?php else: ?>
    <div class="alert alert-warning"><?php echo e(__('label.no_information', [], $currentLanguage->locale)); ?></div>
    <!-- ********************************************** Pagination **********************************************   -->
    <?php endif; ?>
    <?php $__env->stopSection(); ?>
    <!-- ./page content section -->

<?php echo $__env->make('site.page-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>