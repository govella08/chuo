<!doctype html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('label.site_title') }}: Dashboard</title>
    <link rel="stylesheet" href="{{asset('bower_components/foundation/css/foundation.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.css')}}">
    <link rel="stylesheet" href="{{asset('stylesheets/fonts.css')}}">
    <link rel="stylesheet" href="{{ asset('javascript/redactor/redactor.css') }}">
<!-- <link rel="stylesheet" href="{{ asset('stylesheets/dataTables.foundation.css') }}" > -->
<!-- <link rel="stylesheet" href="{{ asset('stylesheets/movable_menu.css') }}" > -->
<!-- <link rel="stylesheet" href="{{ asset('stylesheets/cropit.css') }}" > -->
    <link rel="stylesheet" href="{{ asset('stylesheets/bootstrap-tagsinput.css') }}">
<!-- <link rel="stylesheet" href="{{asset('stylesheets/selectize.css')}}" > -->
    <link rel="stylesheet" href="{{asset('stylesheets/main.css')}}">

    <link rel="stylesheet" href="{{asset('stylesheets/dataTables.min.css')}}">

    <script src="{{ asset('javascript/DOMPurify/purify.min.js') }}"></script>

    <script src="{{ asset('bower_components/jquery/dist/jquery.js') }}"></script>

<!-- <script src="{{asset('javascript/modernizr.custom.js')}}"></script> -->

    @yield('stylesheets')
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
    @if (Auth::guest())
        <center><h1>Please Login: <a href="{{ url('/system')}}">Here</a></h1>
            <br> <img id="profile-img" class="profile-img-card" src="{{ asset('site/images/logo.png') }}"/>
        </center>

    @else

        <div class="row collapse">
            <div class="large-2 medium-12 small-12 columns">
                <div class="logo">
                    <img src="{{ asset('site/images/logo.png')}}" alt=""> <!-- New CMS -->

                </div>
            </div>

            <div class="large-10 medium-12 small-12 columns">
                <div class="info-bar">
                    <div class="row">
                        <div class="large-6 columns">

                        <!-- <a href="{{ url('cms/publications') }}" style='color:white' class="menu-icon icon-tenders">Publications</a> -->
                        </div>

                        <div class="large-6 columns">
							<span class="profile right">
								<i class="ion ion-ios-contact"></i> {{Auth::user()->name}} | <a
                                        href="{{url('auth/logout')}}"><i class="ion ion-log-out"></i> </a>
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
                            <a href="{{ url('cms/pages') }}" class="menu-icon icon-news">Informations</a>
                            <span class="right menu_closed menu_dropdown"></span>
                            <ul class="sub_menu" <?php
                            if(strpos($_SERVER['REQUEST_URI'], 'news') || strpos($_SERVER['REQUEST_URI'], 'announcements') || strpos($_SERVER['REQUEST_URI'], 'speeches') || strpos($_SERVER['REQUEST_URI'], 'highlights') || strpos($_SERVER['REQUEST_URI'], 'professional_courses') || strpos($_SERVER['REQUEST_URI'], 'events') || strpos($_SERVER['REQUEST_URI'], 'welcome') ){
                            ?> style="display:block; "<?php }?>>
                                <li><a href="{{ url('cms/alumni') }}">Alumni</a></li>
                                <li><a href="{{ url('cms/announcements') }}">Announcements</a></li>
                                <li><a href="{{ url('cms/campuses') }}">Campuses</a></li>
                                <!-- <li><a href="{{ url('cms/welcome') }}">Welcome</a></li> -->
                                <li><a href="{{ url('cms/news') }}">News</a></li>
                                <li><a href="{{ url('cms/events') }}">Events</a></li>
                                
                                <li><a href="{{ url('cms/speeches') }}">Speeches</a></li>
                                <li><a href="{{ url('cms/highlights') }}">Highlights</a></li>
                            </ul>
                        </li>

                        <li <?php
                            if(strpos($_SERVER['REQUEST_URI'], 'menu')  ){
                            ?> style="background:#F5F6F7; "<?php }?>>
                            <a href="{{url('cms/menu')}}" class="menu-icon levels">Menu</a>
                        </li>

                        <li <?php
                            if(strpos($_SERVER['REQUEST_URI'], 'publication_categories') ||
                        strpos($_SERVER['REQUEST_URI'], 'publications') ||
                        strpos($_SERVER['REQUEST_URI'], 'tenders') ||
                        strpos($_SERVER['REQUEST_URI'], 'pressreleases')    ){
                            ?> style="background:#F5F6F7; "<?php }?>>
                            <a href="{{ url('cms/publications') }}" class="menu-icon icon-tenders">Documents</a>
                            <span class="right menu_closed menu_dropdown"></span>
                            <ul class="sub_menu"
                                <?php
                                if(strpos($_SERVER['REQUEST_URI'], 'publication_categories') ||
                                strpos($_SERVER['REQUEST_URI'], 'publications') ||

                                strpos($_SERVER['REQUEST_URI'], 'tenders') ||

                                strpos($_SERVER['REQUEST_URI'], 'pressreleases')    ){
                                ?> style="display:block; "<?php }?>>
                                <li>
                                    <a href="{{ url('cms/publication_categories') }}">Documents Categories</a>
                                </li>
                                <li>
                                    <a href="{{ url('cms/publications') }}">Documents</a>
                                </li>
                                <!-- 
                                <li>
                                    <a href="{{ url('cms/pressreleases') }}">Press Releases</a>
                                </li>

                                <li><a href="{{ url('cms/tenders') }}">Tenders</a></li>
                                <li><a href="{{ url('cms/vacancies') }}">Vacancies</a></li>  -->

                            </ul>
                        </li>
<!--
                        <li <?php
                            if(strpos($_SERVER['REQUEST_URI'], 'project_categories') ||
                        strpos($_SERVER['REQUEST_URI'], 'projects') ){
                            ?> style="background:#F5F6F7; "<?php }?>>
                            <a href="{{ url('cms/projects') }}" class="menu-icon icon-tenders">Projects</a>
                            <span class="right menu_closed menu_dropdown"></span>
                            <ul class="sub_menu"
                                <?php
                                if(strpos($_SERVER['REQUEST_URI'], 'project_categories') ||
                                strpos($_SERVER['REQUEST_URI'], 'projects')
                                ){
                                ?> style="display:block; "<?php }?>>
                                <li>
                                    <a href="{{ url('cms/project_categories') }}">Project Categories</a>
                                </li>
                                <li>
                                    <a href="{{ url('cms/projects') }}">Projects</a>
                                </li>

                            </ul>
                        </li> -->
                    
										<li <?php
                    if(strpos($_SERVER['REQUEST_URI'], 'services')){
                    ?> style="background:#F5F6F7; "<?php }?>>
											<a href="{{ url('cms/services') }}" class="menu-icon icon-analytics">Services</a></li> 

                        <li>
                            <a href="{{url('cms/biography')}}" class="menu-icon icon-person">Welcome Note</a>
                        </li>
                        <li <?php
                            if(strpos($_SERVER['REQUEST_URI'], 'levels') || strpos($_SERVER['REQUEST_URI'], 'programmes')  ){
                            ?> style="background:#F5F6F7; "<?php }?>>
                            <a href="{{ route('cms.programmes.index') }}" class="menu-icon icon-tenders">Programmes</a>
                            <span class="right menu_closed menu_dropdown"></span>
                            <ul class="sub_menu">
                                <li>
                                    <a href="{{ route('cms.levels.index') }}">Levels</a>
                                </li>
                            </ul>
                        </li>

                        <!-- <li>
                            <a href="{{ url('cms/administration') }}">Administration</a>
                            <span class="right menu_closed menu_dropdown"></span>
                            <ul class="sub_menu">
                                <li>
                                    <a href="{{ url('cms/administration') }}">Administration</a>
                                </li>
                                <li>
                                    <a href="{{ url('cms/administration_categories') }}">Categories</a>
                                </li>
                                <li>
                                    <a href="{{ url('cms/administration_groups') }}">Groups</a>
                                </li>
                            </ul>
                        </li> -->
                        
                    <!-- <li>
												<a href="{{url('cms/howdois')}}" class="menu-icon icon-social">How Do I</a>
											</li> -->

                        <li <?php
                            if(strpos($_SERVER['REQUEST_URI'], 'page-categories') || strpos($_SERVER['REQUEST_URI'], 'pages')  ){
                            ?> style="background:#F5F6F7; "<?php }?>>
                            <a href="{{ route('cms.pages.index') }}" class="menu-icon icon-tenders">Pages</a>
                            <span class="right menu_closed menu_dropdown"></span>
                            <ul class="sub_menu">
                                <li>
                                    <a href="{{ route('cms.page-categories.index') }}">Page Categories</a>
                                </li>
                            </ul>
                        </li>

                        <li <?php
                            if(strpos($_SERVER['REQUEST_URI'], 'galleries') || strpos($_SERVER['REQUEST_URI'], 'media')  ){
                            ?> style="background:#F5F6F7; "<?php }?>>
                            <a href="{{ url('cms/galleries') }}" class="menu-icon icon-gallery">Gallery</a>

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
                                    <a href="{{ url('cms/related_links') }}">Related Links</a>
                                </li>

                                <li>

                                    <a href="{{ url('cms/quick_links') }}">Quick Links</a>
                                </li>

                                <li>
                                    <a href="{{ url('cms/social_links') }}">Social Links</a>
                                </li>
                                {{--<li>--}}
                                {{--<a href="{{ url('cms/external_links') }}">External Links</a>--}}
                                {{--</li>--}}
                                <li>
                                    <a href="{{ url('cms/staffemail') }}">Staff Email Links</a>
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
                                    <a href="{{ url('cms/administration') }}">Administration</a>
                                    <span class="right menu_closed menu_dropdown"></span>
                                    <ul class="sub_menu">
                                        <li>
                                            <a href="{{ url('cms/administration') }}">Administration</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('cms/administration_categories') }}">Categories</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('cms/administration_groups') }}">Groups</a>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="{{route('cms.users.create-user-form')}}">Users</a>
                                </li>
                                <li>
                                    <a href="{{url('cms/roles')}}">Roles</a>
                                </li>

                                <li>
                                    <a href="{{ url('cms/translations') }}">Translations</a>
                                </li>
                                <li>
                                    <a href="{{ url('cms/faqs') }}">FAQs</a>
                                </li>


                            <!-- <li>
									<a href="{{ url('cms/offices')}}">Contacts Us Offices</a>
								</li> -->
                                <li>
                                    <a href="{{ url('cms/contacts')}}">Contacts Us Details</a>
                                </li>
                                <li>
                                    <a href="{{ route('cms.users.user-change-password-form') }}">Change Password </a>
                                </li>
                            </ul>
                        </li>


                        <li <?php
                            if(strpos($_SERVER['REQUEST_URI'], 'settings')  ){
                            ?> style="background:#F5F6F7; "<?php }?>>
                            <a href="{{ url('cms/settings') }}" class="menu-icon icon-analytics">Content & Analytics</a>
                            <span class="right menu_closed menu_dropdown"></span>
                            <ul class="sub_menu"
                                <?php
                                if(strpos($_SERVER['REQUEST_URI'], 'settings')  ){
                                ?> style="display:block; "<?php }?>>

                            <!-- <li><a href="{{ url('cms/googlemaps') }}">Google Map</a></li> -->
                                <li><a href="{{ url('cms/googleanalytics') }}">Google Analytics</a></li>
                                @if(isset($settings))
                                    @foreach($settings as $setting)
                                        <li>
                                            <a href="{{ url('cms/settings/edit', $setting->id) }}">{{ $setting->name_en }}</a>
                                        </li>
                                    @endforeach
                                @endif
                                
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>

            <div class="large-10 medium-12 small-12 columns">
                <section>
                    <div class="section_content">
                        @yield('content')
                    </div>
                </section>
            </div>
        </div>
    @endif
</div>
<!-- .wrapper ends -->

{!! Session::pull('noty') !!}

<div class="status-report"></div>

<!-- <script src="{{ asset('javascript/application.js') }}"></script> -->
<!-- <script src="{{ asset('javascript/jquery.nestable.js') }}"></script> -->
<!-- <script src="{{ asset('javascript/jquery.cropit.js') }}"></script> -->
<!-- <script src="{{ asset('javascript/movable_menu.js') }}"></script> -->
<!-- <script src="{{ asset('javascript/menu/forms.js') }}"></script> -->
<script src="{{asset('bower_components/foundation/js/foundation.min.js')}}"></script>
<!-- // <script src="{{asset('bower_components/foundation/js/foundation/foundation.accordion.js')}}"></script> -->

<script>
    window.csrfToken = '<?php echo csrf_token(); ?>';
    window.ajaxBasePath = "{{env('AJAX_BASEPATH','/')}}";
</script>
<script src="{{ asset('javascript/redactor/redactor.js') }}"></script>
<script src="{{ asset('javascript/redactor/plugins/fullscreen/fullscreen.js') }}"></script>
<script src="{{ asset('javascript/redactor/plugins/imagemanager/imagemanager.js') }}"></script>
<script src="{{ asset('javascript/redactor/plugins/filemanager/filemanager.js') }}"></script>
<script src="{{ asset('javascript/redactor/plugins/video/video.js') }}"></script>

<!-- this script is for the navigation menu toggling up and down -->
<script src="{{ asset('javascript/menu.js') }}"></script>
<script src="{{ asset('javascript/textarea.js') }}"></script>
<script src="{{ asset('javascript/links.js') }}"></script>
<!-- <script src="{{ asset('javascript/classie.js') }}"></script> -->
<!-- <script src="{{ asset('javascript/notificationFx.js') }}"></script> -->
<script src="{{ asset('javascript/delete.js') }}"></script>
<!-- <script src="{{ asset('javascript/openjs.js') }}"></script> -->
<script src="{{ asset('javascript/bootstrap-tagsinput.js') }}"></script>
<!--DATA TABLES CODES -->
<script src="{!! asset('javascript/jquery.dataTables.js')!!}" type="text/javascript"></script>
<script src="{!! asset('javascript/searchfile.js')!!}" type="text/javascript" charset="utf-8"></script>
<!--END DATA TABLE CODES -->


@yield('scripts');


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
