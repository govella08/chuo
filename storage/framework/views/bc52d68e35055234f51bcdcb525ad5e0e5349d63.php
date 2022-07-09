

<!-- setting browser tab title -->
<?php $__env->startSection('title'); ?>
<?php echo e(label('lbl_departments')); ?>

<?php $__env->stopSection(); ?>
<!-- ./setting browser tab title -->

<!-- setting page title -->
<?php $__env->startSection('page-title'); ?>
<?php echo e(label('lbl_departments')); ?>

<?php $__env->stopSection(); ?>
<!-- ./setting page title -->

<?php $__env->startSection('breadcrumbs-list'); ?>
<li class="breadcrumb-item"><?php echo e(label('lbl_administration')); ?></li>
<li class="breadcrumb-item active"><?php echo e(label('lbl_departments')); ?></li>
<?php $__env->stopSection(); ?>


<!-- page content section -->
<?php $__env->startSection('page-content'); ?>

<div class="departments">
    <div class="row">
        <div class="col-4">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <?php if(count($departments)): ?>
                <?php  $dept_count = 1;  ?>
                <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a class="nav-link <?php if($dept_count==1) echo 'active show'; ?>" id="v-pills-<?php echo e($dept_count); ?>-tab" data-toggle="pill" href="#v-pills-<?php echo e($dept_count); ?>" role="tab" aria-controls="v-pills-<?php echo e($dept_count); ?>" aria-selected="<?php if($dept_count==1){echo 'true';}  else {echo 'false';} ?>"><?php echo e($dept->{langdb('deptName')}); ?></a>
                <?php  $dept_count += 1;  ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-8">
            <div class="tab-content" id="v-pills-tabContent">

              <?php if(count($departments)): ?>
              <?php  $dept_count = 1;  ?>
              <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

              <div class="tab-pane fade <?php if($dept_count==1) echo 'active show'; ?>" id="v-pills-<?php echo e($dept_count); ?>" role="tabpanel" aria-labelledby="v-pills-<?php echo e($dept_count); ?>-tab">
                <h5><?php echo e($dept->{langdb('deptName')}); ?></h5>
                <br>
                <?php echo $dept->{langdb('content')}; ?>

            </div>
            <?php  $dept_count += 1;  ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

        </div>
    </div>
</div>
</div>

<?php $__env->stopSection(); ?>
<!-- ./page content section -->



<?php echo $__env->make('site.page-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>