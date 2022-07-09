

<!-- setting browser tab title -->
<?php $__env->startSection('title'); ?>
<?php echo __('label.biography', [], $currentLanguage->locale); ?>

<?php $__env->stopSection(); ?>
<!-- ./setting browser tab title -->

<!-- setting page title -->
<?php $__env->startSection('page-title'); ?>
<?php echo __('label.biography', [], $currentLanguage->locale); ?>

<?php $__env->stopSection(); ?>
<!-- ./setting page title -->

<?php $__env->startSection('breadcrumbs-list'); ?>
<li class="breadcrumb-item active"><?php echo __('label.biography', [], $currentLanguage->locale); ?></li>
<?php $__env->stopSection(); ?>


<!-- page content section -->
<?php $__env->startSection('page-content'); ?>
<div class="biography">

    <div class="row"> 
        <div class="col-md-3">
            <div class="card text-center p-2">
                <div class="card-body p-1">
                    <img class="card-img-top mb-3 img-thumbnail" src="<?php echo asset('/uploads/alumni/medium-'.$alumnis->photo_url); ?>" alt="<?php echo __($alumnis->title,[],$currentLanguage->locale); ?> <?php echo $alumnis->fullname; ?>" alt="Photo">

                    <h6 class="card-title mb-1"><?php echo __($alumnis->title_translation); ?></h6>
                    <h6 class="card-title mb-1 text-small"><?php echo __($alumnis->title_translation); ?> <?php echo $alumnis->fullname; ?></h6>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <?php echo __($alumnis->alumni); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<!-- ./page content section -->



<?php echo $__env->make('site.page-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>