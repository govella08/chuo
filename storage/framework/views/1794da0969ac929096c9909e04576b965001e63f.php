

<!-- setting browser tab title -->
<?php $__env->startSection('title'); ?>
<?php echo e(__('label.video_gallery', [], $currentLanguage->locale)); ?>

<?php $__env->stopSection(); ?>
<!-- ./setting browser tab title -->

<!-- setting page title -->
<?php $__env->startSection('page-title'); ?>
<?php echo e(__('label.video_gallery', [], $currentLanguage->locale)); ?>

<?php $__env->stopSection(); ?>
<!-- ./setting page title -->

<?php $__env->startSection('breadcrumbs-list'); ?>
<li class="breadcrumb-item"> <?php echo e(__('label.media_center', [], $currentLanguage->locale)); ?> </li>
<li class="breadcrumb-item active"> <?php echo e(__('label.video_gallery', [], $currentLanguage->locale)); ?> </li>
<?php $__env->stopSection(); ?>


<!-- page content section -->
<?php $__env->startSection('page-content'); ?>
<?php if(count($videos)): ?>
<?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<!-- video block -->
<div class="row border-bottom mr-2">
  <div class="col-md-4"> 
    <div class="video-container  mb-2 ">
      <iframe  src="https://www.youtube.com/embed/<?php echo utube_hash($video->url); ?>" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen"  msallowfullscreen="msallowfullscreen"  oallowfullscreen="oallowfullscreen"  webkitallowfullscreen="webkitallowfullscreen"></iframe>
    </div>
  </div>
  <div class="col-md-8">
    <div class="">
      <h6 class="mb-1"> <?php echo __($video->title_translation); ?> </h6>
      <p class="mb-1"> <?php echo __($video->content_translation); ?> </p>
      <p class="date"> <?php echo e(__('label.posted', [], $currentLanguage->locale)); ?>: <i class="fa fa-calendar-alt"></i> <?php echo date('M d, Y', strtotime($video->created_at)); ?></p>
    </div>
  </div>                     
</div>
<!-- ./video block -->


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
<div class="text-center">
  <span class="badge badge-danger">
    <?php echo label('lbl_no_information'); ?>

  </span>
</div>
<?php endif; ?>


<!-- ********************************************** Pagination **********************************************   -->
<nav aria-label="Page navigation" class="nav-pagination">
  <ul class="pagination">
   <?php echo $videos->render(); ?>

 </ul>
</nav>
<!-- ********************************************** Pagination **********************************************   -->
<?php $__env->stopSection(); ?>
<!-- ./page content section -->
















<?php echo $__env->make('site.page-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>