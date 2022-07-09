



<!-- setting browser tab title -->
<?php $__env->startSection('title'); ?>
<?php echo e(__('label.photo_gallery', [], $currentLanguage->locale)); ?>

<?php $__env->stopSection(); ?>
<!-- ./setting browser tab title -->

<!-- setting page title -->
<?php $__env->startSection('page-title'); ?>
<?php echo e(__('label.photo_gallery', [], $currentLanguage->locale)); ?>

<?php $__env->stopSection(); ?>
<!-- ./setting page title -->

<?php $__env->startSection('breadcrumbs-list'); ?>
<li class="breadcrumb-item"> <?php echo e(__('label.media_center', [], $currentLanguage->locale)); ?> </li>
<li class="breadcrumb-item active"> <?php echo e(__('label.photo_gallery', [], $currentLanguage->locale)); ?> </li>
<?php $__env->stopSection(); ?>


<!-- page content section -->
<?php $__env->startSection('page-content'); ?>
<div>
    <ul class="photo-listing list-unstyled clearfix">


        <?php $i = 1;?>
        <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($gallery->photos->count()): ?>

        <li class="galleria mb-3 d-md-flex">
            <div class="mr-3">
                <a href="<?php echo e(asset($gallery->photos->first()->image())); ?>" class="gallery-item d-flex align-items-center justify-content-center" title="<?php echo __($gallery->photos->first()->content); ?>">
                    <img src="<?php echo asset($gallery->photos->first()->image('thumb')); ?>" alt="<?php echo __($gallery->photos->first()->title); ?>">
                    <span class="position-absolute text-light"><i class="fa fa-camera"></i> <?php echo e($gallery->photos->count()); ?></span>
                </a>
                <?php $__currentLoopData = $gallery->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $gal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($index >= 1): ?>

                <a href="<?php echo e(asset($gal->image())); ?>" class="gallery-item hidden" title="<?php echo e(__($gal->title)); ?>"></a>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
            <div class="mt-3 mt-md-0">
                <h6 class="mb-1"> <?php echo e(__($gallery->title)); ?> </h6>
                <p class="mb-1"> <?php echo e(__($gallery->content)); ?> </p>
                <p class="date"><?php echo e(__('label.posted', [], $currentLanguage->locale)); ?> : <i class="fa fa-calendar"></i> <?php echo e(date('F, d, Y',strtotime($gallery->created_at))); ?></p>

            </div>
        </li>


        <?php endif; ?> 
        <?php $i++; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </ul>
</div>
<!-- ********************************************** Pagination **********************************************   -->
<nav aria-label="Page navigation" class="nav-pagination">
   <?php echo $galleries->render(); ?>

</nav>
<!-- ********************************************** Pagination **********************************************   -->
<?php $__env->stopSection(); ?>
<!-- ./page content section -->








<?php $__env->startSection('js-content'); ?>

<script src="<?php echo e(asset('site/js/magnific-popup.min.js')); ?>"></script>
<script>
    $(document).ready(function() {

        $('li.galleria').each(function() {
            $(this).magnificPopup({
                type: 'image',
                delegate: 'a',
                gallery: {
                    enabled: true
                }
            });
        })
    });
</script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('site.page-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>