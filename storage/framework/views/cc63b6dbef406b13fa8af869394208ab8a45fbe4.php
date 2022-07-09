

<!-- setting browser tab title -->
<?php $__env->startSection('title'); ?>
<?php echo e(__('label.contact', [], $currentLanguage->locale)); ?>

<?php $__env->stopSection(); ?>
<!-- ./setting browser tab title -->

<!-- setting page title -->
<?php $__env->startSection('page-title'); ?>
<?php echo e(__('label.contact', [], $currentLanguage->locale)); ?>

<?php $__env->stopSection(); ?>
<!-- ./setting page title -->

<?php $__env->startSection('breadcrumbs-list'); ?>
<li class="breadcrumb-item active"> <?php echo e(__('label.contact', [], $currentLanguage->locale)); ?> </li>
<?php $__env->stopSection(); ?>


<!-- page content section -->
<?php $__env->startSection('page-content'); ?>

<!-- messsages -->

<?php if(session('success')): ?>
<div class="alert alert-success"><?php echo e(session('success')); ?></div>
<?php elseif(session('error')): ?>
<div class="alert alert-danger"><?php echo e(session('error')); ?></div>
<?php endif; ?>
<!-- ./messsages -->
<div class="contact">

  <!-- Google Map -->
  <div class="google-map mb-3 img-thumbnail">
    <div id="map" class="text-dark">
      <!-- Map goes here -->
  </div>
</div>
<!-- End Google Map -->


<!-- End Google Map -->

<div class="row">
    <div class="col-md-5">
        <address>
            <h6><?php echo e(__('label.site_title')); ?>.</h6>
            <i class="fa fa-map-marker"></i> <?php echo e(__('label.address')); ?> <?php echo e($contact->{langdb('physical_address')}); ?><br>
            <span class="font-bold"><i class="fa fa-phone"></i> <?php echo e(__('label.hotline')); ?>:</span> <?php echo $contact->phone; ?><br>
            <span class="font-bold"><i class="fa fa-fax"></i> <?php echo e(__('label.fax')); ?>: N&#333;:</span> <?php echo $contact->fax; ?><br>
            <span class="font-bold"><i class="fa fa-globe"></i> <?php echo e(__('label.email')); ?>:</span> <?php echo $contact->email; ?><br>
        </address>
    </div>

    <div class="col-md-7">
        <div>
            <?php echo Form::open(['route' => 'contactus.store', 'class'=> 'add_p']); ?>

            <legend><?php echo __('label.feedback'); ?></legend>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <?php echo Form::text('names',null,['placeholder'=>'' ,'required', 'autocomplete' => 'off']); ?>

                    <label for="names"><?php echo e(__('label.fullname')); ?></label>
                </div>
                <div class="col-md-6 col-sm-6">
                    <?php echo Form::email('email',null,['placeholder'=>'' ,'required', 'autocomplete' => 'off']); ?>

                    <label for="email"><?php echo e(__('label.email')); ?></label>
                    <p><span class='form_error' style="color:red;"><?php echo $errors->first('email'); ?></span></p>
                </div>
                <div class="col-md-12 col-sm-12">
                    <?php echo Form::text('phone',null,['placeholder'=>'' ,'required', 'autocomplete' => 'off']); ?>

                    <label for="names"><?php echo e(__('label.phone')); ?></label>
                </div>
                    <!-- <div class="col-md-6 col-sm-6">
                                                <input type="text" name="organization" required autocomplete = "off" />
                                                <label for="names">Organization</label>
                                            </div> -->
                                            <div class="col-md-12 col-sm-12 p-1">
                                                <?php echo Form::text('subject',null,['placeholder'=>'' ,'autofocus','required']); ?>

                                                <label for="names"><?php echo e(__('label.subject')); ?></label>
                                                <p> <span class='form_error' style="color:red;"><?php echo $errors->first('subject'); ?></span></p>
                                            </div>
                                            <div class="col-md-12 col-sm-12 p-2">
                                                <?php echo Form::textarea('message',null,['placeholder'=>'Message','cols'=>'30','rows'=>'3','autofocus','required']); ?>


                                                    <p><span class='form_error' style="color:red;"><?php echo $errors->first('message'); ?></span></p>
                                                </div>

                                                <div class="col-md-12 col-sm-12 pt-2 clearfix pl-2 pr-2">
                                                    <!-- Replace data-sitekey with your own one, generated at https://www.google.com/recaptcha/admin -->
                                                    <div class="g-recaptcha pull-right" data-sitekey="6LfKURIUAAAAAO50vlwWZkyK_G2ywqE52NU7YO0S"></div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success btn-raised pull-right"> <?php echo e(__('label.send')); ?></button>
                                            <?php echo Form::close(); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php $__env->stopSection(); ?>
                            <!-- ./page content section -->






                            <?php $__env->startSection('js-content'); ?>
                            <script>
                                function initMap() {
        // Set Latitude and Longitude of a location
        var location_name = {
            lat: -6.8169177,
            lng: 39.2924413
        };
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17, //Set Zoom Of a Map
            center: location_name
        });
        //show marker
        var marker = new google.maps.Marker({
            position: location_name,
            map: map //  ,
            // icon: '.images/e-GA.png'
        });
        infoWindow.open(map, marker);
    }

</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcoUpKjmWk5Ng_W-qfpW7LaUGa_lOTzSE&callback=initMap">
</script>

<script src='https://www.google.com/recaptcha/api.js'></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.page-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>