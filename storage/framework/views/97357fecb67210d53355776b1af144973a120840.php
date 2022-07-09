

<!-- setting browser tab title -->
<?php $__env->startSection('title'); ?>
    <?php echo __('label.related_links', [], $currentLanguage->locale); ?>

<?php $__env->stopSection(); ?>
<!-- ./setting browser tab title -->

<!-- setting page title -->
<?php $__env->startSection('page-title'); ?>
    <?php echo __('label.related_links', [], $currentLanguage->locale); ?>

<?php $__env->stopSection(); ?>
<!-- ./setting page title -->

<?php $__env->startSection('breadcrumbs-list'); ?>
    <li class="breadcrumb-item active"><?php echo __('label.related_links', [], $currentLanguage->locale); ?></li>
<?php $__env->stopSection(); ?>


<!-- page content section -->
<?php $__env->startSection('page-content'); ?>
<div class="more-howdoi">
    <ul class="list-unstyled px-3 ">
        <?php $__empty_1 = true; $__currentLoopData = $related_links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $links): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        
        <li>
            <a href="<?php echo $links->url; ?>" target="_blank">
                <i class="fa fa-angle-double-right"></i>
                <?php echo __($links->title_translation); ?>

            </a>
        </li>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php echo label('lbl_no_information'); ?>

        <?php endif; ?>
        
    </ul>
</div>
<?php $__env->stopSection(); ?>
<!-- ./page content section -->






















<?php echo $__env->make('site.page-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>