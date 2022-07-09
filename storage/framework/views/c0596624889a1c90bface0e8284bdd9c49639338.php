

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

<?php if(count($news_list)): ?>
<?php $__currentLoopData = $news_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="row pb-2 more-info border-bottom">
    <div class="col-md-4">
        <div class="">
            <img src="<?php echo asset('uploads/news/medium-'.$news->photo_url); ?>" alt="" class="img-fluid mb-1 img-thumbnail">
        </div>
    </div>
    <div class="col-md-8">
        <div class="">
            <h6 class="mb-1"><?php echo e(__($news->title_translation)); ?></h6>
            <p class="mb-2">
                <?php echo $news->{langdb('summary')}; ?>...
                <a href="<?php echo URL::to('news', $news->slug); ?>"> <?php echo e(__('label.readmore', [], $currentLanguage->locale)); ?> <i class="fa fa-arrow-circle-right"></i></a></p>
                <p class="date mb-1"><?php echo e(__('label.posted', [], $currentLanguage->locale)); ?>: <i class="fa fa-calendar"></i> <?php echo date('M d, Y', strtotime($news->created_at)); ?></p>
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