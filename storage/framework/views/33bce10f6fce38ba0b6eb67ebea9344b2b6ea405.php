<?php $__env->startSection('title', 'Content Not Found'); ?>
<?php $__env->startSection('description', 'Content Not Found'); ?>

<?php $__env->startSection('content'); ?>
<div class="card-container text-center">
    <?php echo $__env->make('notifications.status_message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('notifications.errors_message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>

 <div class="card-main">
            <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="<?php echo e(asset('cms_assets/images/logo.png')); ?>" />
              <center>
              <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1 id="homeHeading" style="color:black">404</h1>
                <h2 style="color:black">Content Not Found!</h2>
                <hr>
                <?php echo $__env->make('notifications.status_message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('notifications.errors_message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
               <a href="<?php echo e(url('/')); ?>">Home</a>
            </div>
        </div>
    </header>
    </center>

        </div><!-- /card-container -->
        </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo asset('assets/js/plugins/parsley/parsley.js'); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>