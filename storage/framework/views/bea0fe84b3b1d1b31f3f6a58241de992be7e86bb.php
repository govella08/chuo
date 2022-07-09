<style>
                  @keyframes    censusBounce {
                      0%   { transform: scale(1,1)      translateY(0); }
                      10%  { transform: scale(1.1,.9)   translateY(0); }
                      30%  { transform: scale(.9,1.1)   translateY(-100px); }
                      50%  { transform: scale(1.05,.95) translateY(0); }
                      57%  { transform: scale(1,1)      translateY(-7px); }
                      64%  { transform: scale(1,1)      translateY(0); }
                      100% { transform: scale(1,1)      translateY(0); }
                  }
                  
                  .census {
                    position: fixed;
                    bottom: 0;
                    z-index: 999;
                    right: 5px;
                  }
                </style>
                  
<a href="https://www.nbs.go.tz/index.php/en/" target="_blank" class="census">
                      <img src="https://www.iae.ac.tz/site/images/sensa-sw.png" alt="Tanzania Census 2022" class="mx-auto img-fluid" style="width:160px;animation: censusBounce ease 3s infinite;"></a>



<!-- INCLUDE FOOTER -->
<footer class="mdl-mega-footer">

<div class="container">
    <div class="footer-middle">

        <div class="footer-dropdown">
            <input class="footer-checkbox" type="checkbox" checked>
            <h4 class="footer-heading"><?php echo e(__('label.contact')); ?></h4>
            <ul class="footer-list  ">
            <?php if(isset($contact->physical_address)): ?>
                <li><i class="fas fa-map-marker-alt"></i>&nbsp;<span> <?php echo __($contact->physical_address_translation); ?> </span></li>
            <?php endif; ?>            
            
            <?php if(isset($contact->phone)): ?>
                <li><i class="fas fa-tty"></i>&nbsp;<?php echo __('label.telephone', [], $local); ?>: <?php echo e(__($contact->phone)); ?></li>
            <?php endif; ?>
            <?php if(isset($contact->fax)): ?>
                <li><i class="fas fa-fax"></i>&nbsp;<?php echo __('label.fax', [], $local); ?>: <?php echo e(__($contact->fax)); ?></li>
            <?php endif; ?>
                <li><i class="far fa-envelope"></i>&nbsp;<a href=<?php echo e("mailto:".__($contact->email)); ?>>E-Mail:
                <?php echo __($contact->email); ?></a></li>
            
                <li class="list-styled-none">
                    <ul class="list-unstyled m-0 d-flex flex-wrap">
                    <?php $__empty_1 = true; $__currentLoopData = $social_links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social_link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php if($social_link->title == 'youtube'): ?>
                        <li class="list-styled-none social-btn mt-3"><a href="<?php echo $social_link->url; ?>"
                                target="_blank"
                                class="bg-youtube d-flex align-items-center justify-content-center"><i
                                    class="fab fa-youtube fa-lg" aria-hidden="true"></i></a></li>
                        <?php endif; ?>

                        <?php if($social_link->title == 'twitter'): ?>
                        <li class="list-styled-none social-btn mt-3"><a href="<?php echo $social_link->url; ?>"
                                target="_blank"
                                class="bg-twitter d-flex align-items-center justify-content-center"><i
                                    class="fab fa-twitter fa-lg" aria-hidden="true"></i></a></li>
                        <?php endif; ?>

                        <?php if($social_link->title == 'facebook'): ?>
                        <li class="list-styled-none social-btn mt-3"><a href="<?php echo $social_link->url; ?>"
                                target="_blank"
                                class="bg-facebook d-flex align-items-center justify-content-center"><i
                                    class="fab fa-facebook-f fa-lg" aria-hidden="true"></i></a></li>
                        <?php endif; ?>

                        <?php if($social_link->title == 'instagram'): ?>
                        <li class="list-styled-none social-btn mt-3"><a href="<?php echo $social_link->url; ?>"
                                target="_blank"
                                class="bg-instagram d-flex align-items-center justify-content-center"><i
                                    class="fab fa-instagram fa-lg" aria-hidden="true"></i></a></li>
                        <?php endif; ?>

                        <?php if($social_link->title == 'whatsapp'): ?>
                        <li class="list-styled-none social-btn mt-3"><a href="<?php echo $social_link->url; ?>"
                                target="_blank"
                                class="bg-google-plus d-flex align-items-center justify-content-center"><i
                                    class="fab fa-google-plus-g fa-lg" aria-hidden="true"></i></a></li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php echo e(__('label.no_information')); ?>

                    <?php endif; ?>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="footer-dropdown">
            <input class="footer-checkbox" type="checkbox" checked>
            <h4 class="footer-heading"><?php echo e(__('label.related_links')); ?></h4>
            <ul class="footer-list list-styled ">
            <?php $__empty_1 = true; $__currentLoopData = $related_links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related_link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <li><a href="<?php echo $related_link->url; ?>" target="_blabk"><?php echo __($related_link->title_translation); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php echo e(__('label.no_information')); ?>

            <?php endif; ?>
                <li class="list-styled-none more-link"><a href="<?php echo e(url('relatedlinks')); ?>"><?php echo __('label.view_more'); ?> <i
                            class="fas fa-plus-circle"></i></a></li>
            </ul>
        </div>

        <div class="footer-dropdown">
          <input class="footer-checkbox" type="checkbox" checked>
          <h4 class="footer-heading"><span class="icon icon-link"></span> <?php echo __('label.quick_links'); ?></h1>
          <ul class="footer-list">
            <?php if( count( $quick_links)): ?>
             <?php $__currentLoopData = $quick_links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quicklink): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><a href="<?php echo url($quicklink->url); ?>">
                <span class="icon-angle-double-right"></span> <?php echo __($quicklink->title_translation); ?>

              </a></li>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           <?php endif; ?>
          </ul>
        </div>
        <div class="footer-dropdown">
            <input class="footer-checkbox" type="checkbox" checked> 
            <h4 class="footer-heading"><?php echo e(__('label.vids')); ?></h4>
            <ul class="footer-list list-unstyled" >
            <li>
                <div class="mx-2 mt-3 d-flex">
                    <div class="embed-responsive embed-responsive-16by9 mx-2">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo utube_hash($video->url); ?>"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </li>
            <li> <a href="<?php echo e(url('galleries/listing/videos')); ?>"><?php echo e(__('label.video_gallery')); ?> <i class="fas fa-plus-circle"></i></a></li>
            </ul>
        </div>

    </div>

    <div class="footer-bottom">
        <ul class="list-inline text-center">
            <li class="list-inline-item"><a href="<?php echo e(url('sitemap')); ?>"><?php echo e(__('label.sitemap',[],$local)); ?></a></li>
            <li class="list-inline-item"><a href="<?php echo e(url('privacy')); ?>"><?php echo e(__('label.privacy_policy',[],$local)); ?></a></li>
            <li class="list-inline-item"><a href="<?php echo e(url('terms-and-conditions')); ?>"><?php echo e(__('label.terms_conditions',[],$local)); ?></a></li>
            <li class="list-inline-item"><a href="<?php echo e(url('copyright')); ?>"> <?php echo e(__('label.copyright_statement',[],$local)); ?></a></li>
            <li class="list-inline-item"><a href="<?php echo e(url('disclaimer')); ?>"><?php echo e(__('label.disclaimer',[],$local)); ?></a></li>
        </ul>
        <div class="text-center">Copyright Â©<span id="copyrightDate"></span>
            <a href="<?php echo e(url('/')); ?>"><?php echo __('label.site_title'); ?></a>. <?php echo __('label.copyright'); ?>

            <br> <?php echo __('label.website_by'); ?> <a href="http://ega.go.tz"
                target="_blank">e-Government Authority</a>. <?php echo __('label.content_maintained'); ?> <?php echo __('label.site_title'); ?>

        </div>
    </div>
</div>
</footer>

<!-- Copyright Date -->
<script>
    let currentYear = new Date().getFullYear();
    let startYear = 2018;
    if (currentYear != startYear) {
        document.getElementById('copyrightDate').innerHTML = (startYear + "-" + new Date().getFullYear());
    } else {
        document.getElementById('copyrightDate').innerHTML = (new Date().getFullYear());
    }

</script>


</div>
<script src="<?php echo e(asset('site/js/jquery.min.js')); ?>"></script>

<script src="<?php echo e(asset('visitors-counter/client.min.js')); ?>"></script>
<script src="<?php echo e(asset('visitors-counter/visitors.logs.js')); ?>"></script>

<script src="<?php echo e(asset('site/js/nprogress.min.js')); ?>"></script>
<script src="<?php echo e(asset('site/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('site/js/matchHeight.min.js')); ?>"></script>
<script src="<?php echo e(asset('site/js/customScrollbar.min.js')); ?>"></script>
<script src="<?php echo e(asset('site/js/slick.min.js')); ?>"></script>
<script src="<?php echo e(asset('site/js/custom.min.js')); ?>"></script>




<?php echo $__env->yieldContent('js-content'); ?>

<script>
    var default_lang = $('.languages-available a.dropdown-item:first-child');

    function dropdown_langSet(val) {
        if (val.innerHTML != "") {
            $('#dropdown_lang').val(val.innerHTML);
            $('#dropdown_lang').html(val.innerHTML);
        } else {
            $('#dropdown_lang').val('');
            $('#dropdown_lang').html(default_lang);
        }
    }

</script>

<script>
    $('#flash-overlay-modal').modal();
</script>