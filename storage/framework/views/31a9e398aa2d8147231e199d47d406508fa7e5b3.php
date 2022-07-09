

<?php $__env->startSection('title'); ?>
Page Title
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumbs_container'); ?>
<nav aria-label="breadcrumb" class="breadcrumb-container">
    <div class="container">
        <ol class="breadcrumb  py-1 mb-0">
            <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><i class="fas fa-home"></i></a></li>
            <?php echo $__env->yieldContent('breadcrumbs-list'); ?>
        </ol>
    </div>
</nav>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>



<div class="content-border">
    <div class="container">
        <!-- sidebar -->
        <?php $__env->startSection('sidebar'); ?>
        <?php echo $__env->make('site.includes.left-sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldSection(); ?>
        <!-- ./sidebar -->
        <div class="sub-main-content jsSubMainHeight">
            <div class="row">
                <div class="col-md-12">

                    <h4 class="title-decoration py-2 mb-3"> <?php echo $__env->yieldContent('page-title'); ?></h4>
                    <div>
                        <!-- page content section -->
                        
                        
                        <?php if($errors->all() && count($errors->all()) > 0): ?>

                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <?php
                        $errorMsgs = '<ul>';
                        foreach($errors->all() as $err) {
                            $errorMsgs .= '<li>';
                            $errorMsgs .= $err;
                            $errorMsgs .= '</li>';
                        }

                        $errorMsgs .= '</ul>';
                        flash($errorMsgs)->error()->important();
                        ?>
                        <?php endif; ?>

                        <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo $__env->yieldContent('page-content'); ?>
                        <!-- ./page content section -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/sub-main-content -->



<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>