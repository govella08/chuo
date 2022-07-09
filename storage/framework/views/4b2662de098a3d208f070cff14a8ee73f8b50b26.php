<!doctype html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(__('label.site_title')); ?>: Dashboard</title>
    <link rel="stylesheet" href="<?php echo e(asset('bower_components/foundation/css/foundation.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('bower_components/Ionicons/css/ionicons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('stylesheets/fonts.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('javascript/redactor/redactor.css')); ?>">
<!-- <link rel="stylesheet" href="<?php echo e(asset('stylesheets/dataTables.foundation.css')); ?>" > -->
<!-- <link rel="stylesheet" href="<?php echo e(asset('stylesheets/movable_menu.css')); ?>" > -->
<!-- <link rel="stylesheet" href="<?php echo e(asset('stylesheets/cropit.css')); ?>" > -->
    <link rel="stylesheet" href="<?php echo e(asset('stylesheets/bootstrap-tagsinput.css')); ?>">
<!-- <link rel="stylesheet" href="<?php echo e(asset('stylesheets/selectize.css')); ?>" > -->
    <link rel="stylesheet" href="<?php echo e(asset('stylesheets/main.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('stylesheets/dataTables.min.css')); ?>">

    <script src="<?php echo e(asset('javascript/DOMPurify/purify.min.js')); ?>"></script>

    <script src="<?php echo e(asset('bower_components/jquery/dist/jquery.js')); ?>"></script>

<!-- <script src="<?php echo e(asset('javascript/modernizr.custom.js')); ?>"></script> -->

    <?php echo $__env->yieldContent('stylesheets'); ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $("form").submit(function () {

                //sanitization of swahili field
                if ($("#redactor_sw").length) {
                    var redactor_swahili = $(this).find("#redactor_sw").val();
                    redactor_swahili = DOMPurify.sanitize(redactor_swahili, {SAFE_FOR_JQUERY: true});
                    $("textarea#redactor_sw").val(redactor_swahili);
                }

                //sanitization of english field
                if ($("#redactor_en").length) {
                    var redactor_english = $(this).find("#redactor_en").val();
                    redactor_english = DOMPurify.sanitize(redactor_english, {SAFE_FOR_JQUERY: true});
                    $("textarea#redactor_en").val(redactor_english);
                }

            });
        });
    </script>
</head>
<body>
<div class="wrapper">
    <?php if(Auth::guest()): ?>
        <center><h1>Please Login: <a href="<?php echo e(url('/system')); ?>">Here</a></h1>
            <br> <img id="profile-img" class="profile-img-card" src="<?php echo e(asset('site/images/logo.png')); ?>"/>
        </center>

    <?php else: ?>

        <div class="row collapse">
            <div class="large-2 medium-12 small-12 columns">
                <div class="logo">
                    <img src="<?php echo e(asset('site/images/logo.png')); ?>" alt=""> <!-- New CMS -->

                </div>
            </div>

            <div class="large-10 medium-12 small-12 columns">
                <div class="info-bar">
                    <div class="row">
                        <div class="large-6 columns">

                        <!-- <a href="<?php echo e(url('cms/publications')); ?>" style='color:white' class="menu-icon icon-tenders">Publications</a> -->
                        </div>

                        <div class="large-6 columns">
							<span class="profile right">
								<i class="ion ion-ios-contact"></i> <?php echo e(Auth::user()->name); ?> | <a
                                        href="<?php echo e(url('auth/logout')); ?>"><i class="ion ion-log-out"></i> </a>
							</span>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="row collapse">
            <div class="large-2 medium-12 small-12 columns">
                <nav>
                    <ul>

                        <li>
                            <a href="#" class="menu-icon icon-home">Dashboard</a>
                        </li>
                        <li <?php
                            if(strpos($_SERVER['REQUEST_URI'], 'news') || strpos($_SERVER['REQUEST_URI'], 'events') || strpos($_SERVER['REQUEST_URI'], 'announcements') || strpos($_SERVER['REQUEST_URI'], 'speeches') || strpos($_SERVER['REQUEST_URI'], 'highlights') || strpos($_SERVER['REQUEST_URI'], 'professional_courses') || strpos($_SERVER['REQUEST_URI'], 'welcome')){
                            ?> style="background:#F5F6F7; "<?php }?>>
                            <a href="<?php echo e(url('cms/pages')); ?>" class="menu-icon icon-news">Informations</a>
                            <span class="right menu_closed menu_dropdown"></span>
                            <ul class="sub_menu" <?php
                            if(strpos($_SERVER['REQUEST_URI'], 'news') || strpos($_SERVER['REQUEST_URI'], 'announcements') || strpos($_SERVER['REQUEST_URI'], 'speeches') || strpos($_SERVER['REQUEST_URI'], 'highlights') || strpos($_SERVER['REQUEST_URI'], 'professional_courses') || strpos($_SERVER['REQUEST_URI'], 'events') || strpos($_SERVER['REQUEST_URI'], 'welcome') ){
                            ?> style="display:block; "<?php }?>>
                                <li><a href="<?php echo e(url('cms/alumni')); ?>">Alumni</a></li>
                                <li><a href="<?php echo e(url('cms/announcements')); ?>">Announcements</a></li>
                                <li><a href="<?php echo e(url('cms/campuses')); ?>">Campuses</a></li>
                                <!-- <li><a href="<?php echo e(url('cms/welcome')); ?>">Welcome</a></li> -->
                                <li><a href="<?php echo e(url('cms/news')); ?>">News</a></li>
                                <li><a href="<?php echo e(url('cms/events')); ?>">Events</a></li>
                                
                                <li><a href="<?php echo e(url('cms/speeches')); ?>">Speeches</a></li>
                                <li><a href="<?php echo e(url('cms/highlights')); ?>">Highlights</a></li>
                            </ul>
                        </li>

                        <li <?php
                            if(strpos($_SERVER['REQUEST_URI'], 'menu')  ){
                            ?> style="background:#F5F6F7; "<?php }?>>
                            <a href="<?php echo e(url('cms/menu')); ?>" class="menu-icon levels">Menu</a>
                        </li>

                        <li <?php
                            if(strpos($_SERVER['REQUEST_URI'], 'publication_categories') ||
                        strpos($_SERVER['REQUEST_URI'], 'publications') ||
                        strpos($_SERVER['REQUEST_URI'], 'tenders') ||
                        strpos($_SERVER['REQUEST_URI'], 'pressreleases')    ){
                            ?> style="background:#F5F6F7; "<?php }?>>
                            <a href="<?php echo e(url('cms/publications')); ?>" class="menu-icon icon-tenders">Documents</a>
                            <span class="right menu_closed menu_dropdown"></span>
                            <ul class="sub_menu"
                                <?php
                                if(strpos($_SERVER['REQUEST_URI'], 'publication_categories') ||
                                strpos($_SERVER['REQUEST_URI'], 'publications') ||

                                strpos($_SERVER['REQUEST_URI'], 'tenders') ||

                                strpos($_SERVER['REQUEST_URI'], 'pressreleases')    ){
                                ?> style="display:block; "<?php }?>>
                                <li>
                                    <a href="<?php echo e(url('cms/publication_categories')); ?>">Documents Categories</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('cms/publications')); ?>">Documents</a>
                                </li>
                                <!-- 
                                <li>
                                    <a href="<?php echo e(url('cms/pressreleases')); ?>">Press Releases</a>
                                </li>

                                <li><a href="<?php echo e(url('cms/tenders')); ?>">Tenders</a></li>
                                <li><a href="<?php echo e(url('cms/vacancies')); ?>">Vacancies</a></li>  -->

                            </ul>
                        </li>
<!--
                        <li <?php
                            if(strpos($_SERVER['REQUEST_URI'], 'project_categories') ||
                        strpos($_SERVER['REQUEST_URI'], 'projects') ){
                            ?> style="background:#F5F6F7; "<?php }?>>
                            <a href="<?php echo e(url('cms/projects')); ?>" class="menu-icon icon-tenders">Projects</a>
                            <span class="right menu_closed menu_dropdown"></span>
                            <ul class="sub_menu"
                                <?php
                                if(strpos($_SERVER['REQUEST_URI'], 'project_categories') ||
                                strpos($_SERVER['REQUEST_URI'], 'projects')
                                ){
                                ?> style="display:block; "<?php }?>>
                                <li>
                                    <a href="<?php echo e(url('cms/project_categories')); ?>">Project Categories</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('cms/projects')); ?>">Projects</a>
                                </li>

                            </ul>
                        </li> -->
                    
										<li <?php
                    if(strpos($_SERVER['REQUEST_URI'], 'services')){
                    ?> style="background:#F5F6F7; "<?php }?>>
											<a href="<?php echo e(url('cms/services')); ?>" class="menu-icon icon-analytics">Services</a></li> 

                        <li>
                            <a href="<?php echo e(url('cms/biography')); ?>" class="menu-icon icon-person">Welcome Note</a>
                        </li>
                        <li <?php
                            if(strpos($_SERVER['REQUEST_URI'], 'levels') || strpos($_SERVER['REQUEST_URI'], 'programmes')  ){
                            ?> style="background:#F5F6F7; "<?php }?>>
                            <a href="<?php echo e(route('cms.programmes.index')); ?>" class="menu-icon icon-tenders">Programmes</a>
                            <span class="right menu_closed menu_dropdown"></span>
                            <ul class="sub_menu">
                                <li>
                                    <a href="<?php echo e(route('cms.levels.index')); ?>">Levels</a>
                                </li>
                            </ul>
                        </li>

                        <!-- <li>
                            <a href="<?php echo e(url('cms/administration')); ?>">Administration</a>
                            <span class="right menu_closed menu_dropdown"></span>
                            <ul class="sub_menu">
                                <li>
                                    <a href="<?php echo e(url('cms/administration')); ?>">Administration</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('cms/administration_categories')); ?>">Categories</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('cms/administration_groups')); ?>">Groups</a>
                                </li>
                            </ul>
                        </li> -->
                        
                    <!-- <li>
												<a href="<?php echo e(url('cms/howdois')); ?>" class="menu-icon icon-social">How Do I</a>
											</li> -->

                        <li <?php
                            if(strpos($_SERVER['REQUEST_URI'], 'page-categories') || strpos($_SERVER['REQUEST_URI'], 'pages')  ){
                            ?> style="background:#F5F6F7; "<?php }?>>
                            <a href="<?php echo e(route('cms.pages.index')); ?>" class="menu-icon icon-tenders">Pages</a>
                            <span class="right menu_closed menu_dropdown"></span>
                            <ul class="sub_menu">
                                <li>
                                    <a href="<?php echo e(route('cms.page-categories.index')); ?>">Page Categories</a>
                                </li>
                            </ul>
                        </li>

                        <li <?php
                            if(strpos($_SERVER['REQUEST_URI'], 'galleries') || strpos($_SERVER['REQUEST_URI'], 'media')  ){
                            ?> style="background:#F5F6F7; "<?php }?>>
                            <a href="<?php echo e(url('cms/galleries')); ?>" class="menu-icon icon-gallery">Gallery</a>

                        </li>
                        <li <?php

                            if(strpos($_SERVER['REQUEST_URI'], 'related_links') || strpos($_SERVER['REQUEST_URI'], 'staffemail')

                        || strpos($_SERVER['REQUEST_URI'], 'quick_links') || strpos($_SERVER['REQUEST_URI'], 'social_links')  ){
                            ?> style="background:#F5F6F7; "<?php }?>>
                            <a href="#" class="menu-icon icon-at">Links</a>
                            <span class="right menu_closed menu_dropdown"></span>
                            <ul class="sub_menu" <?php

                            if(strpos($_SERVER['REQUEST_URI'], 'related_links')

                            || strpos($_SERVER['REQUEST_URI'], 'quick_links') || strpos($_SERVER['REQUEST_URI'], 'staffemail') || strpos($_SERVER['REQUEST_URI'], 'social_links')  ){
                            ?> style="display:block; "<?php }?>>
                                <li>
                                    <a href="<?php echo e(url('cms/related_links')); ?>">Related Links</a>
                                </li>

                                <li>

                                    <a href="<?php echo e(url('cms/quick_links')); ?>">Quick Links</a>
                                </li>

                                <li>
                                    <a href="<?php echo e(url('cms/social_links')); ?>">Social Links</a>
                                </li>
                                
                                
                                
                                <li>
                                    <a href="<?php echo e(url('cms/staffemail')); ?>">Staff Email Links</a>
                                </li>
                            </ul>
                        </li>

                        <li <?php
                            if(
                            strpos($_SERVER['REQUEST_URI'], 'administration') ||
                            strpos($_SERVER['REQUEST_URI'], 'administration_categories') ||
                            strpos($_SERVER['REQUEST_URI'], 'user-registration-form') ||
                            strpos($_SERVER['REQUEST_URI'], 'user-roles') ||
                            strpos($_SERVER['REQUEST_URI'], 'user-permissions') ||
                            strpos($_SERVER['REQUEST_URI'], 'faqs') ||
                            strpos($_SERVER['REQUEST_URI'], 'translations') ||
                            strpos($_SERVER['REQUEST_URI'], 'roles') ||
                            strpos($_SERVER['REQUEST_URI'], 'contactus') ||
                            strpos($_SERVER['REQUEST_URI'], 'roles') ||
                            strpos($_SERVER['REQUEST_URI'], 'notes') ||
                            strpos($_SERVER['REQUEST_URI'], 'contacts') ||
                            strpos($_SERVER['REQUEST_URI'], 'visitations')  ){
                            ?> style="background:#F5F6F7; "<?php }?>
                        >
                            <a href="#" class="menu-icon icon-settings">Settings</a>
                            <span class="right menu_closed menu_dropdown"></span>
                            <ul class="sub_menu"
                                <?php
                                if(
                                strpos($_SERVER['REQUEST_URI'], 'administration') ||
                                strpos($_SERVER['REQUEST_URI'], 'administration_categories') ||
                                strpos($_SERVER['REQUEST_URI'], 'user-registration-form') ||
                                strpos($_SERVER['REQUEST_URI'], 'user-roles') ||
                                strpos($_SERVER['REQUEST_URI'], 'user-permissions') ||
                                strpos($_SERVER['REQUEST_URI'], 'faqs') ||
                                strpos($_SERVER['REQUEST_URI'], 'translations') ||
                                strpos($_SERVER['REQUEST_URI'], 'roles') ||
                                strpos($_SERVER['REQUEST_URI'], 'contactus') ||
                                strpos($_SERVER['REQUEST_URI'], 'roles') ||
                                strpos($_SERVER['REQUEST_URI'], 'notes') ||
                                strpos($_SERVER['REQUEST_URI'], 'contacts') ||
                                strpos($_SERVER['REQUEST_URI'], 'user-change-password') ||
                                strpos($_SERVER['REQUEST_URI'], 'visitations') ){
                                ?> style="display:block; "<?php }?>>
                                <li>
                                    <a href="<?php echo e(url('cms/administration')); ?>">Administration</a>
                                    <span class="right menu_closed menu_dropdown"></span>
                                    <ul class="sub_menu">
                                        <li>
                                            <a href="<?php echo e(url('cms/administration')); ?>">Administration</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(url('cms/administration_categories')); ?>">Categories</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(url('cms/administration_groups')); ?>">Groups</a>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="<?php echo e(route('cms.users.create-user-form')); ?>">Users</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('cms/roles')); ?>">Roles</a>
                                </li>

                                <li>
                                    <a href="<?php echo e(url('cms/translations')); ?>">Translations</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('cms/faqs')); ?>">FAQs</a>
                                </li>


                            <!-- <li>
									<a href="<?php echo e(url('cms/offices')); ?>">Contacts Us Offices</a>
								</li> -->
                                <li>
                                    <a href="<?php echo e(url('cms/contacts')); ?>">Contacts Us Details</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('cms.users.user-change-password-form')); ?>">Change Password </a>
                                </li>
                            </ul>
                        </li>


                        <li <?php
                            if(strpos($_SERVER['REQUEST_URI'], 'settings')  ){
                            ?> style="background:#F5F6F7; "<?php }?>>
                            <a href="<?php echo e(url('cms/settings')); ?>" class="menu-icon icon-analytics">Content & Analytics</a>
                            <span class="right menu_closed menu_dropdown"></span>
                            <ul class="sub_menu"
                                <?php
                                if(strpos($_SERVER['REQUEST_URI'], 'settings')  ){
                                ?> style="display:block; "<?php }?>>

                            <!-- <li><a href="<?php echo e(url('cms/googlemaps')); ?>">Google Map</a></li> -->
                                <li><a href="<?php echo e(url('cms/googleanalytics')); ?>">Google Analytics</a></li>
                                <?php if(isset($settings)): ?>
                                    <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a href="<?php echo e(url('cms/settings/edit', $setting->id)); ?>"><?php echo e($setting->name_en); ?></a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>

            <div class="large-10 medium-12 small-12 columns">
                <section>
                    <div class="section_content">
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </section>
            </div>
        </div>
    <?php endif; ?>
</div>
<!-- .wrapper ends -->

<?php echo Session::pull('noty'); ?>


<div class="status-report"></div>

<!-- <script src="<?php echo e(asset('javascript/application.js')); ?>"></script> -->
<!-- <script src="<?php echo e(asset('javascript/jquery.nestable.js')); ?>"></script> -->
<!-- <script src="<?php echo e(asset('javascript/jquery.cropit.js')); ?>"></script> -->
<!-- <script src="<?php echo e(asset('javascript/movable_menu.js')); ?>"></script> -->
<!-- <script src="<?php echo e(asset('javascript/menu/forms.js')); ?>"></script> -->
<script src="<?php echo e(asset('bower_components/foundation/js/foundation.min.js')); ?>"></script>
<!-- // <script src="<?php echo e(asset('bower_components/foundation/js/foundation/foundation.accordion.js')); ?>"></script> -->

<script>
    window.csrfToken = '<?php echo csrf_token(); ?>';
    window.ajaxBasePath = "<?php echo e(env('AJAX_BASEPATH','/')); ?>";
</script>
<script src="<?php echo e(asset('javascript/redactor/redactor.js')); ?>"></script>
<script src="<?php echo e(asset('javascript/redactor/plugins/fullscreen/fullscreen.js')); ?>"></script>
<script src="<?php echo e(asset('javascript/redactor/plugins/imagemanager/imagemanager.js')); ?>"></script>
<script src="<?php echo e(asset('javascript/redactor/plugins/filemanager/filemanager.js')); ?>"></script>
<script src="<?php echo e(asset('javascript/redactor/plugins/video/video.js')); ?>"></script>

<!-- this script is for the navigation menu toggling up and down -->
<script src="<?php echo e(asset('javascript/menu.js')); ?>"></script>
<script src="<?php echo e(asset('javascript/textarea.js')); ?>"></script>
<script src="<?php echo e(asset('javascript/links.js')); ?>"></script>
<!-- <script src="<?php echo e(asset('javascript/classie.js')); ?>"></script> -->
<!-- <script src="<?php echo e(asset('javascript/notificationFx.js')); ?>"></script> -->
<script src="<?php echo e(asset('javascript/delete.js')); ?>"></script>
<!-- <script src="<?php echo e(asset('javascript/openjs.js')); ?>"></script> -->
<script src="<?php echo e(asset('javascript/bootstrap-tagsinput.js')); ?>"></script>
<!--DATA TABLES CODES -->
<script src="<?php echo asset('javascript/jquery.dataTables.js'); ?>" type="text/javascript"></script>
<script src="<?php echo asset('javascript/searchfile.js'); ?>" type="text/javascript" charset="utf-8"></script>
<!--END DATA TABLE CODES -->


<?php echo $__env->yieldContent('scripts'); ?>;


<script>
    $('#myTabs').on('click', function (event, tab) {
        $(document).foundation('tab', 'reflow');
    });
</script>

<script>
    $(document).ready(function () {
        $('.close-noty').click(function () {
            $(this).parent().fadeOut();
        });

        setTimeout(function () {
            $('.notification-panel').fadeOut();
        }, 10000);

    });
</script>

</body>
</html>
