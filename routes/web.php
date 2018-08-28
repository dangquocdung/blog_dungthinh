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










Route::get('/', 'IndexController@avigher_index');
Route::get('/index', 'IndexController@avigher_index');
Route::post('/index', ['as'=>'index','uses'=>'IndexController@avigher_subscribe']);
Route::get('/thankyou/{id}', 'IndexController@newsletter_activate');


/************* BLOG ***************/
Route::get('/blog', 'BlogController@avigher_index');
Route::get('/blog/{id}', 'BlogController@avigher_singlepost');
Route::post('/blog', ['as'=>'blog','uses'=>'BlogController@avigher_blog_comment']);


Route::get('/portfolio/{id}', 'PortfolioController@avigher_portfolio');

/************ END BLOG *************/












/************** TAGS ***************/

Route::get('/tag/{type}/{id}', 'TagController@avigher_tag');



/************* END TAGS ***************/





/************** DASHBOARD **********/


Route::get('/logout', 'DashboardController@avigher_logout');
Route::get('/delete-account', 'DashboardController@avigher_deleteaccount');
Route::post('/dashboard', ['as'=>'dashboard','uses'=>'DashboardController@avigher_edituserdata']);

/*********** END DASHBOARD ************/






Route::get('/success/{cid}', 'SuccessController@avigher_showpage');
Route::get('/cancel', 'CancelController@avigher_showpage');
Route::post('/stripe-success', ['as'=>'stripe-success','uses'=>'SuccessController@avigher_stripe']);






Auth::routes();

	
	Route::get('/about-us','PageController@avigher_about_us');
	
	Route::get('/page/{id}','PageController@avigher_viewpage');
	
	Route::get('/support','PageController@avigher_support');
	
	Route::get('/faq','PageController@avigher_faq');
	
	Route::get('/terms-of-use','PageController@avigher_terms');
	
	Route::get('/privacy-policy','PageController@avigher_privacy');
	
	
	
	Route::get('/404','PageController@avigher_404');
	
	
	/******** Forgot Password *********/
	
	
	Route::get('/forgot-password','ForgotpasswordController@avigher_forgot_view');
	Route::post('/forgot-password', ['as'=>'forgot-password','uses'=>'ForgotpasswordController@avigher_forgot_password']);
	
	
	/************* End Forgot Password **********/
	
	
	/************** Reset Password ***********/
	
	
	
	Route::get('/reset-password/{id}', 'ResetpasswordController@avigher_reset_view');
	
	Route::post('/reset-password', ['as'=>'reset-password','uses'=>'ResetpasswordController@avigher_reset_password']);
	/************** End Reset Password *************/
	
	
	
	
	Route::get('/contact-us','PageController@avigher_contact');
	
	Route::post('/contact-us', ['as'=>'contact-us','uses'=>'PageController@avigher_mailsend']);
	
	
	
	Route::post('/payment', ['as'=>'payment','uses'=>'PageController@avigher_donate_payment']);
	
	Route::get('/choose_payment/{id}','PageController@avigher_membership_payment');
	










/* Route::group(['namespace' => 'Admin', 'middleware' => 'admin'], function() {*/

Route::group(['middleware' => 'admin'], function() {

    Route::get('/admin','Admin\DashboardController@index');
    Route::get('/admin/index','Admin\DashboardController@index');
	
	/* user */
	Route::get('/admin/users','Admin\UsersController@index');
	Route::get('/admin/adduser','Admin\AdduserController@formview');
	Route::post('/admin/adduser', ['as'=>'admin.adduser','uses'=>'Admin\AdduserController@adduserdata']);
    
	Route::get('/admin/users/{id}','Admin\UsersController@destroy');
	Route::get('/admin/edituser/{id}','Admin\EdituserController@showform');
	Route::post('/admin/edituser', ['as'=>'admin.edituser','uses'=>'Admin\EdituserController@edituserdata']);
	Route::post('/admin/users', ['as'=>'admin.users','uses'=>'Admin\UsersController@delete_all']);
	/* end user */
	
	
	
	
	/* services */
	Route::get('/admin/services','Admin\ServicesController@index');
	Route::get('/admin/addservice','Admin\AddserviceController@formview');
	Route::post('/admin/addservice', ['as'=>'admin.addservice','uses'=>'Admin\AddserviceController@addservicedata']);
	Route::get('/admin/services/{id}','Admin\ServicesController@destroy');
	Route::get('/admin/editservice/{id}','Admin\EditserviceController@showform');
	Route::post('/admin/editservice', ['as'=>'admin.editservice','uses'=>'Admin\EditserviceController@editservicedata']);
	Route::post('/admin/services', ['as'=>'admin.services','uses'=>'Admin\ServicesController@delete_all']);
	/* end services */
	
	
	/* sub services */
	
	Route::get('/admin/subservices','Admin\SubservicesController@index');
	Route::get('/admin/addsubservice','Admin\AddsubserviceController@formview');
	Route::get('/admin/addsubservice','Admin\AddsubserviceController@getservice');
	Route::post('/admin/addsubservice', ['as'=>'admin.addsubservice','uses'=>'Admin\AddsubserviceController@addsubservicedata']);
	Route::get('/admin/subservices/{id}','Admin\SubservicesController@destroy');
	
	
	
	Route::get('/admin/editsubservice/{id}','Admin\EditsubserviceController@edit');
	
	Route::post('/admin/editsubservice', ['as'=>'admin.editsubservice','uses'=>'Admin\EditsubserviceController@editsubservicedata']);
	Route::post('/admin/subservices', ['as'=>'admin.subservices','uses'=>'Admin\SubservicesController@delete_all']);
	/* end sub services */
	
	
	
	
	
	
	/* Newletter */
	Route::get('/admin/newsletter','Admin\NewsletterController@index');
	Route::get('/admin/newsletter/{action}/{id}/{sid}','Admin\NewsletterController@status');
	Route::get('/admin/newsletter/{id}','Admin\NewsletterController@destroy');
	Route::get('/admin/sendupdates','Admin\AddnewsletterController@formview');
	Route::post('/admin/sendupdates', ['as'=>'admin.sendupdates','uses'=>'Admin\AddnewsletterController@addupdatedata']);
	Route::post('/admin/newsletter', ['as'=>'admin.newsletter','uses'=>'Admin\NewsletterController@delete_all']);
	
	/* End Newsletter */
	
	
	
	
	
	
	/* Testimonials */
	
	Route::get('/admin/testimonials','Admin\TestimonialsController@index');
	Route::get('/admin/add-testimonial','Admin\AddtestimonialController@formview');
	Route::post('/admin/add-testimonial', ['as'=>'admin.add-testimonial','uses'=>'Admin\AddtestimonialController@addtestimonialdata']);
	Route::get('/admin/testimonials/{id}','Admin\TestimonialsController@destroy');
	Route::get('/admin/edit-testimonial/{id}','Admin\EdittestimonialController@showform');
	Route::post('/admin/edit-testimonial', ['as'=>'admin.edit-testimonial','uses'=>'Admin\EdittestimonialController@testimonialdata']);
	
	
	/* end Testimonials */
	
	
	
	
	/* Blogs */
	
	Route::get('/admin/blog','Admin\BlogController@index');
	Route::get('/admin/add-blog','Admin\AddblogController@formview');
	Route::post('/admin/add-blog', ['as'=>'admin.add-blog','uses'=>'Admin\AddblogController@addblogdata']);
	Route::get('/admin/blog/{id}','Admin\BlogController@destroy');
	Route::get('/admin/edit-blog/{id}','Admin\EditblogController@showform');
	Route::post('/admin/edit-blog', ['as'=>'admin.edit-blog','uses'=>'Admin\EditblogController@blogdata']);
	Route::post('/admin/blog', ['as'=>'admin.blog','uses'=>'Admin\BlogController@delete_all']);
	
	Route::get('/admin/comment/{blog}/{comment}/{id}','Admin\BlogController@view_comment');
	Route::get('/admin/comment/{pid}/{sid}','Admin\BlogController@status_comment');
	Route::get('/admin/comment/{id}','Admin\BlogController@comment_destroy');
	/* end Blogs */
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/* pages */
	
	Route::get('/admin/pages','Admin\PagesController@index');
	Route::get('/admin/edit-page/{id}','Admin\PagesController@showform');
	Route::post('/admin/edit-page', ['as'=>'admin.edit-page','uses'=>'Admin\PagesController@pagedata']);
	Route::post('/admin/pages', ['as'=>'admin.pages','uses'=>'Admin\PagesController@delete_all']);
	Route::get('/admin/pages/{id}','Admin\PagesController@deleted');
	
	Route::get('/admin/add-page','Admin\PagesController@formview');
	Route::post('/admin/add-page', ['as'=>'admin.add-page','uses'=>'Admin\PagesController@addpagedata']);
	/* end pages */
	
	
	
	
	/* membership */
	
	Route::get('/admin/membership','Admin\MembershipController@membership_index');
	Route::get('/admin/edit_membership/{id}','Admin\MembershipController@showform');
	Route::post('/admin/edit_membership', ['as'=>'admin.edit_membership','uses'=>'Admin\MembershipController@pagedata']);
	Route::get('/admin/add_membership','Admin\MembershipController@formview');
	Route::post('/admin/add_membership', ['as'=>'admin.add_membership','uses'=>'Admin\MembershipController@addplandata']);
	Route::get('/admin/membership/{id}','Admin\MembershipController@deleted');
	Route::get('/admin/membership/{action}/{id}/{sid}','Admin\MembershipController@status');
	
	/* end membership */
	
	
	
	
	/* start settings */
	
	
	Route::get('/admin/settings','Admin\SettingsController@showform');
	Route::post('/admin/settings', ['as'=>'admin.settings','uses'=>'Admin\SettingsController@editsettings']);
	
	/* end settings */
	
	
	/* media settings */
	
	Route::get('/admin/media-settings','Admin\MediasettingsController@showform');
	Route::post('/admin/media-settings', ['as'=>'admin.media-settings','uses'=>'Admin\MediasettingsController@editsettings']);
	
	/* end media settings */
	
	
	
	/* color settings */
	
	Route::get('/admin/color-settings','Admin\ColorsettingsController@showform');
	Route::post('/admin/color-settings', ['as'=>'admin.color-settings','uses'=>'Admin\ColorsettingsController@editsettings']);
	
	/* end color settings */
	
	
	/* start slideshow */
	
	Route::get('/admin/slideshow','Admin\SlideshowController@index');
	Route::get('/admin/add-slideshow','Admin\AddslideshowController@formview');
	Route::post('/admin/add-slideshow', ['as'=>'admin.add-slideshow','uses'=>'Admin\AddslideshowController@addslideshowdata']);
	Route::get('/admin/slideshow/{id}','Admin\SlideshowController@destroy');
	Route::get('/admin/edit-slideshow/{id}','Admin\EditslideshowController@showform');
	Route::post('/admin/edit-slideshow', ['as'=>'admin.edit-slideshow','uses'=>'Admin\EditslideshowController@slideshowdata']);
	
	/* end slideshow */
	
	
	
	/* start portfolio */
	
	
	Route::get('/admin/portfolio','Admin\PortfolioController@index');
	Route::get('/admin/portfolio/{action}/{sid}/{id}/{user_id}','Admin\PortfolioController@portfolio_status');
	
	
	Route::get('/admin/add-portfolio','Admin\AddportfolioController@formview');
	Route::post('/admin/add-portfolio', ['as'=>'admin.add-portfolio','uses'=>'Admin\AddportfolioController@addportfoliodata']);
	Route::get('/admin/portfolio/{id}','Admin\PortfolioController@destroy');
	Route::get('/admin/edit-portfolio/{id}','Admin\EditportfolioController@showform');
	Route::post('/admin/edit-portfolio', ['as'=>'admin.edit-portfolio','uses'=>'Admin\EditportfolioController@portfoliodata']);
	Route::post('/admin/portfolio', ['as'=>'admin.portfolio','uses'=>'Admin\PortfolioController@delete_all']);
	
	/* end portfolio */
	
	
	
	
	
	
	
	
   
});


Route::group(['middleware' => 'web'], function (){
    
    Route::get('/dashboard', 'DashboardController@index');
	Route::get('/membership', 'DashboardController@membership');
	
    Route::get('/my-comments', 'DashboardController@mycomments');
	Route::get('/my-comments/{id}', 'DashboardController@mycomments_destroy');
	
	Route::get('/my-portfolio', 'MyPortfolioController@index');
	Route::get('/my-portfolio/{id}','MyPortfolioController@destroy');
	
    Route::get('/add_portfolio','MyPortfolioController@formview');
	Route::post('/add_portfolio', ['as'=>'add_portfolio','uses'=>'MyPortfolioController@addportfoliodata']);
});




