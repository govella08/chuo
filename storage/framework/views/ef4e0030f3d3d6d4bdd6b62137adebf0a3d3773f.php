

<!-- setting browser tab title -->
<?php $__env->startSection('title'); ?>
<?php echo e(__('label.management', [], $currentLanguage->locale)); ?>

<?php $__env->stopSection(); ?>
<!-- ./setting browser tab title -->

<!-- setting page title -->
<?php $__env->startSection('page-title'); ?>
<?php echo e(__($category->title)); ?>

<?php $__env->stopSection(); ?>
<!-- ./setting page title -->

<?php $__env->startSection('breadcrumbs-list'); ?>
<li class="breadcrumb-item"><?php echo e(__('label.administration', [], $currentLanguage->locale)); ?></li>
<li class="breadcrumb-item active"><a href="<?php echo e(url('administration',$category->id)); ?>"><?php echo e(__('label.management', [], $currentLanguage->locale)); ?></a></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
<?php $__env->stopSection(); ?>

<!-- page content section -->
<?php $__env->startSection('page-content'); ?>

          
  <div class="board-team">
      <?php if($administration->count() > 0): ?>
      <?php $rownum1 = 1; ?>

      <div class="row">
        <?php $__empty_1 = true; $__currentLoopData = $administration; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $administration1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php
        if($rownum1 < $administration1->position){
          echo '</div>';
          echo '<div class="row">';
          if($category->has_label == 1){
            echo '<div class="col-md-12">
                    <h4 class="title text-center bg-primary py-2 text-light">';
            }
        }
        ?> <?php if($rownum1 < $administration1->position && $administration1->category->has_label == 1): ?>
                <?php echo e(__($administration1->group->title)); ?>

            <?php endif; ?>
        
        <?php
        if($rownum1 < $administration1->position){
            echo '</h4> </div>';
            $rownum1++;
        }        
        ?>


          <div class="col-md-3 mx-auto">
              <div class="board-team-member">
                  <div class="board-team-image text-center p-2">
                      <img class="img-fluid" src="<?php echo e(url('/uploads/administration/thumb-'.$administration1->photo_url)); ?>" alt="board Profile">
                  </div>
                  <div class="board-team-info p-2">
                      <div class="title-decoration my-1 text-center"> <?php echo e(__($administration1->title)); ?> </div>
                      <div class="title-decoration my-1"><i class="fas fa-user"></i> <?php echo e($administration1->fullname); ?> </div>
                      <div><i class="fas fa-envelope"></i> <a href=<?php echo e("mailto:".__($administration1->email)); ?>> <?php echo e($administration1->email); ?> </a></div>
                  </div>    
              </div>
          </div>
        
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <?php echo e(__('label.no_information')); ?>

        <?php endif; ?>

      </div>

      <?php endif; ?>
      
<?php $__env->stopSection(); ?>
<!-- ./page content section -->
<?php echo $__env->make('site.page-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>