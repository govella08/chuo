

<!-- setting browser tab title -->
<?php $__env->startSection('title'); ?>
<?php echo e(__('label.faq', [], $currentLanguage->locale)); ?>

<?php $__env->stopSection(); ?>
<!-- ./setting browser tab title -->

<!-- setting page title -->
<?php $__env->startSection('page-title'); ?>
<?php echo e(__('label.faq', [], $currentLanguage->locale)); ?>

<?php $__env->stopSection(); ?>
<!-- ./setting page title -->

<?php $__env->startSection('breadcrumbs-list'); ?>
<li class="breadcrumb-item active"> <?php echo e(__('label.faq', [], $currentLanguage->locale)); ?> </li>
<?php $__env->stopSection(); ?>


<!-- page content section -->
<?php $__env->startSection('page-content'); ?>
<div class="faq">
  <div id="faq-accordion">

   <?php 
   $num=1; ?>  
   <?php if(count($faqs)): ?>
   <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <?php //echo $num; ?>
   
   <div class="card">
    <div class="card-header" id="faq-question<?php echo e($num); ?>">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#faq-collapse<?php echo e($num); ?>" aria-expanded="<?php if($num==1){ echo 'true'; }else{ echo "false";}?>" aria-controls="faq-collapse<?php echo e($num); ?>">
          <?php echo __($faq->question_translation); ?>

        </button>
      </h5>
    </div>
    <div id="faq-collapse<?php echo e($num); ?>" class="collapse <?php if($num==1){ echo 'show'; }?>" aria-labelledby="faq-question<?php echo e($num); ?>" data-parent="#faq-accordion">
      <div class="card-body">
        <?php echo nl2br(__($faq->answer_translation)); ?>

      </div>
    </div>
  </div>
  <?php $num++; ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php else: ?>
  <div class="alert alert-info"><?php echo e(__('label.no_information')); ?></div>
  <?php endif; ?>

</div>
</div>

<!-- ********************************************** Pagination **********************************************   -->
<nav aria-label="Page navigation" class="nav-pagination">

  <?php echo $faqs->render(); ?>

  
</nav>
<!-- ********************************************** Pagination **********************************************   -->
<?php $__env->stopSection(); ?>
<!-- ./page content section -->



















<?php echo $__env->make('site.page-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>