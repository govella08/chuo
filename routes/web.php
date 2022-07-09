<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// For selectively chosen routes:
	Route::group(['prefix' => \UriLocalizer::localeFromRequest(), 'middleware' => 'localize'], function () {
	    Route::get('posts', 'PostController@index');
	    Route::get('posts/create', 'PostController@create');
	    
	});

Route::post('posts', 'PostController@store');



Route::get('home', 'HomeController@index');*/

Route::get('system', 'UserController@login');

Route::post('auth/login', 'UserController@authenticate');
Route::get('auth/logout', 'UserController@logout')->middleware('auth');


//Route::resource('password/reset','Auth\ForgotPasswordController');


Route::get('password/email', 'Auth\ForgotPasswordController@showLinkRequestForm');

Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

//This route is out of auth group due to ajax request being brocked by auth middleware
Route::get('menu/menu-items/{id}/edit', 'MenuItemsController@edit');

Route::middleware(['auth','checked','cors'])->prefix('cms')->name('cms.')->group(function(){

    Route::get('/',['as'=>'cms.dashboard.view-dashboard','uses'=>'DashboardController@index']);

    Route::resource('contacts', 'ContactsController');
    Route::resource('newsletter', 'NewsletterController');

    //Route::resource('notes', 'NoteController');

    //Route::post('notes/photo',['as'=>'cms.notes.photo','uses'=>'NoteController@photoUpload']);

    //Route::resource('welcome', 'WelcomeNoteController');

    Route::resource('settings', 'SettingsController');

    Route::resource('translations', 'TranslationsController',['except'=>['edit','update']]);
    
    Route::post('trans_update', array(
        "uses" => "TranslationsController@trans_update",
        "as"   => "translations.update",
    ));

    Route::resource('faqs', 'FaqsController');
    // Route::resource('offices', 'OfficesController');

    Route::resource('news', 'NewsController');

    Route::resource('unit', 'UnitsController');
    Route::resource('department', 'DepartmentsController');
    Route::resource('regional_office', 'RegionalOfficesController');
    /*Route::resource('trainings', 'TrainingsController');

    Route::resource('professional_courses', 'ProfessionalCoursesController');
    Route::resource('tailor_made_courses', 'TailorMadeCourseController');*/
    
    Route::resource('staffemail', 'StaffEmailController');

    //Route::resource('accreditations', 'AccreditationsController');
    
    //Route::resource('ranges', 'RangesController');

    //Route::resource('aboutus', 'AboutusController');

    //::resource('complains', 'ComplaintsController');

    Route::resource('quick_links', 'QuickLinksController');

    Route::resource('related_links', 'RelatedLinksController');

    Route::resource('external_links', 'ExternalLinksController');

    Route::resource('social_links', 'SocialLinksController');

    Route::resource('googleanalytics', 'GoogleAnalyticsController');

    //Route::resource('googlemaps', 'GoogleMapsController');

    Route::resource('events', 'EventsController');

    Route::resource('revenues', 'RevenuesController');

    Route::resource('vacancies', 'VacanciesController');


    Route::resource('announcements', 'AnnouncementsController');

    Route::resource('publications', 'PublicationsController');

    Route::resource('projects', 'ProjectsController');


    Route::resource('administration', 'AdministrationController');

    Route::resource('services', 'ServicesController');

    Route::resource('howdois', 'HowDoIController');

    Route::resource('speeches', 'SpeechesController');

    Route::resource('highlights', 'HighlightsController');

    Route::resource('pressreleases', 'PressReleaseController');

    Route::resource('publication_categories', 'PublicationsCategoriesController');

    Route::resource('project_categories', 'ProjectsCategoriesController');

    Route::resource('administration_categories', 'AdministrationCategoriesController');

    Route::resource('administration_groups', 'AdministrationGroupsController');

    Route::resource('main_categories', 'MainCategoriesController');

    Route::resource('menu', 'MenusController');

    Route::resource('menu-items', 'MenuItemsController', ['except' => ['index','edit']]);

    Route::get('menu-items/list/{menuID}',['as'=>'menu-items.index','uses'=>'MenuItemsController@index']);
    
    // Route::get('menu-items/create/{menuID}',['as'=>'cms.menu-items.create','uses'=>'MenuItemsController@create']);
    
    Route::any('ajax_menu_update', array(
        'uses' => 'MenuItemsController@ajax_update',
        'as'   => 'menu-items.ajax-update',
    ));

    Route::resource('contactus', 'ContactUsController');

    Route::resource('revenues', 'ContactUsController');

    Route::resource('allocations', 'AllocationController');
    
    Route::resource('plans', 'PlanController');

    Route::resource('levels', 'LevelController');

    Route::resource('programmes', 'ProgrammesController');

    Route::resource('alumni', 'AlumniController');

    Route::resource('campuses', 'AcademicCampusController');

    Route::resource('biography', 'BiographiesController');

    Route::post('biography/photo/{bioID}',['as'=>'biography.photo','uses'=>'BiographiesController@photoUpload']);

    Route::resource('galleries', 'GalleriesController');
    
    Route::resource('media', 'MediaController', ['except' => ['index']]);
    
    Route::get('media/list/{galleryID}',['as'=>'media.index','uses'=>'MediaController@index']);

    Route::resource('pages', 'PagesController');
    
    Route::resource('page-categories', 'PageCategoriesController');

    Route::resource('tenders', 'TendersController');

    Route::resource('roles', 'RolesController',['except'=>['create']]);


    Route::any('upload', array(
        'uses' => 'UploadsController@upload',
        'as'   => 'cms.text-editor.upload',
    ));

    Route::any('upload_file', array(
        'uses' => 'UploadsController@upload_file',
        'as'   => 'cms.text-editor.upload_file',
    ));

    Route::any('getimages', array(
        'uses' => 'UploadsController@getImages',
        'as'   => 'cms.text-editor.getimages',
    ));

    Route::any('getfiles', array(
        'uses' => 'UploadsController@getFiles',
        'as'   => 'cms.text-editor.getfiles',
    ));

    Route::any('delete_file', array(
        'uses' => 'UploadsController@deleteFile',
        'as'   => 'cms.text-editor.delete_file',
    ));

    Route::get('user-registration-form', array(
        'uses' => 'UserController@registerForm',
        'as'   => 'users.create-user-form',
    ));

    Route::get('user-registration-form/{id}', array(
        'uses' => 'UserController@userForm',
        'as'   => 'users.edit-user',
    ));

    Route::post('update-user/{id}', array(
        'uses' => 'UserController@updateUserForm',
        'as'   => 'users.update-user',
    ));

    Route::delete('users/{id}', array(
        'uses' => 'UserController@destroy',
        'as'   => 'users.destroy'
    ));

    Route::post('user-register', array(
        'uses' => 'UserController@createUser',
        'as'   => 'users.create-user',
    ));

    Route::get('user-roles/{userID}', array(
        'uses' => 'UserController@userRolesForm',
        'as'   => 'users.user-roles-form',
    ));

    Route::post('user-roles-update', array(
        'uses' => 'UserController@updateUserRoles',
        'as'   => 'users.update-user-roles',
    ));

    Route::get('user-permissions/{userID}', array(
        'uses' => 'UserController@userPermissionsForm',
        'as'   => 'users.user-permissions-form',
    ));

    Route::post('user-permissions-update', array(
        'uses' => 'UserController@updateUserPermissions',
        'as'   => 'users.update-user-permissions',
    ));

    Route::get('user-change-password', array(
        'uses' => 'UserController@changeUserPasswordForm',
        'as'   => 'users.user-change-password-form',
    ));


    Route::post('user-change-password', array(
        'uses' => 'UserController@updateUserPassword',
        'as'   => 'users.user-change-password',
    ));

    // Route::resource('applicants','ApplicantsController');



});


Route::group(['prefix' => \UriLocalizer::localeFromRequest(), 'middleware' => 'localize'], function () {

    Route::namespace('site')->group(function () {

        Route::get('/', 'HomeController@index');

        Route::resource('news', 'NewsController');

        Route::resource('campuses', 'AcademicCampusController');

        Route::resource('programmes', 'ProgrammesController');

        Route::resource('alumni', 'AlumniController');

        Route::resource('highlights', 'HighLightsController');


        Route::resource('newsletter', 'NewsletterController', ['except' => ['edit', 'destroy', 'update']]);
        

        Route::resource('sections', 'DepartmentsController');
        Route::resource('unit', 'UnitsController');

        Route::resource('regional_offices', 'RegionalOfficesController');

        //Route::resource('welcome', 'WelcomeNoteController');

        //Route::resource('aboutus', 'AboutusController');

        //Route::resource('notes', 'NoteController');

        Route::resource('faqs', 'FaqsController');

        Route::resource('events', 'EventsController');

        Route::resource('announcements', 'AnnouncementsController');
        //Route::get('Announcements/show/{id}', 'AnnouncementsController@show');


        Route::resource('tenders', 'TendersController');


        Route::resource('pages', 'PagesController');

        Route::get('pages/show/{slug}', 'PagesController@show');

        Route::get('relatedlinks', 'RelatedLinksController@index');

        //Route::resource('complains', 'ComplaintsController');

        //Route::get('search', 'SearchController@search');
        Route::get('search', 'SearchController@scoutSearch');

        Route::resource('vacancies', 'VacanciesController');

        Route::resource('publications', 'PublicationController');

        Route::resource('projects', 'ProjectController');
        Route::get('project/{slug}', 'ProjectController@single');

        Route::resource('administration', 'AdministrationController');
        Route::get('administration/list/{id}', 'AdministrationController@single_admin');

        Route::resource('services', 'ServicesController');
        Route::get('services/show/{id}', 'ServicesController@single_service');

        Route::resource('howdois', 'HowDoIController');
        Route::get('howdois/show/{id}', 'HowDoIController@show');

        

        Route::resource('speeches', 'SpeechController');

        Route::resource('pressreleases', 'PressReleaseController');

        Route::resource('publication_categories', 'PublicationCategoriesController');
        Route::resource('department', 'DepartmentsController');
        //Route::resource('project_categories', 'ProjectCategoriesController');

        Route::resource('administration_categories', 'AdministrationCategoriesController');


        Route::resource('main_categories', 'MainCategoriesController');

        Route::get('privacy', [
            'uses' => 'ContentsController@privacy',
            'as'   => 'privacy',
        ]);

        Route::get('disclaimer', [
            'uses' => 'ContentsController@disclaimer',
            'as'   => 'disclaimer',
        ]);

        Route::get('copyright', [
            'uses' => 'ContentsController@copyright',
            'as'   => 'copyright-statement',
        ]);
        Route::get('terms-and-conditions', [
            'uses' => 'ContentsController@terms',
            'as'   => 'terms',
        ]);

        Route::resource('biography', 'BiographiesController', ['except' => ['index', 'store', 'edit', 'store', 'destroy', 'update']]);

        //Route::resource('notes', 'NoteController', ['except' => ['index', 'store', 'edit', 'store', 'destroy', 'update']]);
        
        Route::resource('contactus', 'ContactUsController', ['except' => ['edit', 'destroy', 'update']]);

        Route::resource('galleries', 'GalleriesController', ['except' => ['index']]);

        Route::get('galleries/listing/{type}/{id}', ['as' => 'galleries.index', 'uses' => 'GalleriesController@index']);
        Route::get('galleries/listing/{type}', ['as' => 'galleries.index', 'uses' => 'GalleriesController@index']);  
        Route::get('sitemap', 'SitemapController@index');

        /* online services routes */
        Route::get('online_services/new_water_connection','OnlineServicesController@waterConnection')->name('online_services.new_water_connection');

        Route::post('water_connection','OnlineServicesController@saveNewWaterConnection')->name('water_connection');

        Route::get('online_services/report_issue','OnlineServicesController@reportIssue')->name('online_services.report_issue');

        Route::post('report_issue','OnlineServicesController@saveReportedIssue')->name('report_issue');

        Route::get('online_services/bill_registration','OnlineServicesController@billRegistration')->name('online_services.bill_registration');

        Route::post('bill_registration','OnlineServicesController@saveBillRegistration')->name('bill_registration');

        Route::get('online_services/bill_request','OnlineServicesController@billRequest')->name('online_services.bill_request');

        Route::post('bill_request','OnlineServicesController@getBillDeatils')->name('bill_request');



        Route::get('online_services/customer_account_activation','OnlineServicesController@customerAccountActivation')->name('online_services.customer_account_activation');

        Route::post('activate_customer_account','OnlineServicesController@activateCustomerAccount')->name('activate_customer_account');

        Route::get('online_services/change_account_password','OnlineServicesController@changeAccountPassword')->name('online_services.change_account_password');

        Route::post('change_account_password','OnlineServicesController@saveChangedAccountPassword')->name('change_account_password');

        /* ./online services routes */
    });
});
