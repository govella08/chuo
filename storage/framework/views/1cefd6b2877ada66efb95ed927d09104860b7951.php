<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="some page description here">
    <meta name="keywords" content="page keywords here">


    <title> <?php echo $__env->yieldContent('title'); ?>| <?php echo __('label.site_title'); ?> </title>

    <link rel="author" name="e-GA Designers" />

    <link rel="shortcut icon" href="<?php echo e(asset('site/images/logo.png')); ?>" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Libre+Franklin" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('site/css/master.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('site/css/perfect-scrollber.min.css')); ?>">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
    crossorigin="anonymous">


    <?php echo $__env->yieldContent('css-content'); ?>



    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <?php $local=$currentLanguage->locale; ?>


            <!-- INCLUDE HEADER -->
            <?php echo $__env->make("site.includes.header", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


            <div class="content-layout">

                <div class="clearfix">
                    <section class="main-content mb-2">
                        <?php echo $__env->yieldContent('breadcrumbs_container'); ?>
                        <div class="container">
                            <?php echo $__env->yieldContent('content'); ?>
                        </div>
                    </section>
                </div>
            </div>


            <!-- INCLUDE FOOTER -->
            <?php echo $__env->make("site.includes.footer", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


            <!-- ./endContainer -->

        </body>

        </html>
