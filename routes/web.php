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
Route::get('/home','HomeController@example');

Route:: get('/','FrontController@index')->name('index')->middleware('guest');




Route::get('/logout','auth\LoginController@logout')->name('logout');
Route::get('/index/login','auth\LoginController@index')->name('index.login');
Route::get('/index/signup','auth\RegisterController@index')->name('index.signup');
Route::post('/index/hacker/create','auth\RegisterController@createHacker')->name('index.create.hacker');
Route::post('/index/business/create','auth\RegisterController@createBusiness')->name('index.create.business');
Route::post('/index/login/match','auth\LoginController@adminLogin')->name('index.login.match');
// Route::namespace('auth')->group( function()
//   {
//      Route::get('password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
//      Route::post('password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//       Route::get(' password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
//       Route::post(' password/reset','ResetPasswordController@reset')->name('password.update');

//   });
Auth::routes(['verify'=>true]);
//front side blog post for guest user
Route::get('front/post','BlogController@showpost')->name('post');
Route::get('front/singlepost/{post}','BlogController@singlepost')->name('singlepost');
Route::get('front/post/category/{category}','BlogController@category')->name('post.category');
   //front side gallery rouyte here
Route::get('gallaery','GalleryController@showgallerycategory')->name('gallery');
Route::get('gallaery/{image}','GalleryController@showgallerycategoryimage')->name('gallery.image');
Route::get('contactus','FrontController@contactus')->name('contactus');
Route::post('contactus/store','FrontController@contactStore')->name('contactus.store');
Route::get('business','FrontBusinessController@businessindex')->name('business.index');
Route::get('hacker','FrontHackerController@hackerindex')->name('hacker.index');




  //hacker  route 

Route::prefix('hacker')->namespace('hacker')->middleware('hacker')->name('hacker.')->group(function()
 {
         Route::get('/dashboard', 'DashboardController@hackerindex')->name('dashboard');
         // **profile of hacker**//
         Route::get('/profile', 'HackerController@profile')->name('profile');
         Route::post('/profile/update/{id}', 'HackerController@update')->name('profile.update');
         //** hacker post **//
         Route::get('/post','BlogController@showpost')->name('post');
         Route::get('/singlepost/{post}','BlogController@singlepost')->name('singlepost');
         Route::get('/post/category/{category}','BlogController@category')->name('post.category');
         Route::resource('/create/posts','CreatePostController');
         //event and bounty//
         Route::get('/event/','BountyController@show')->name('event.show');
         Route::get('/event/detail/{detail}','BountyController@showdetail')->name('event.show.detail');
         Route::get('/event/detail/with/category/{category}','BountyController@showcategorydetail')->name('event.show.category.detail');
         Route::get('/closed/bounty','BountyController@closedbounty')->name('closed.bounty');
         //download file
         Route::get('/file/download/{id}','BountyController@download')->name('file.download');

         Route::post('/report/send','BountyController@sendReport')->name('report.send');
         Route::get('/mark/notification/','BountyController@check_read_notification');


});


// admin routes here

Route::prefix('admin')->namespace('admin')->group(function()
{ 
 Route::middleware('redirectToDashboard')->group(function()
    {
     Route::get('/show/login','LoginController@showloginform')->name('admin.show.login');
	 	 Route::post('/login','LoginController@login')->name('admin.login');
	   Route::get('/show/signup','LoginController@showsignupform')->name('admin.show.signup');
	   Route::post('/signup','LoginController@signup')->name('admin.signup');
   });
     Route::get('/logout','LoginController@logout')->name('admin.logout');

     Route::middleware('admin')->name('admin.')->group(function()
     {
       Route::get('/dashboard','DashboardController@show')->name('dashboard');
       Route::resource('categories','CategoryController');
       Route::resource('posts','PostController');
       Route::get('/pending/post','PostController@pendingpost')->name('pending.post');
       Route::post('/approve/post/{post}','PostController@approvepost')->name('approve.post');
       Route::post('/trash/posts/{post}','PostController@trash')->name('trash.post');
       Route::get('/show/trash','PostController@showtrash')->name('show.trash');
       Route::post('/restore/post/{post}','PostController@restorepost')->name('restore.post');
       //bounty category
       Route::resource('category/bounties','BountyCategoryController');
       Route::get('active/bounty','BountyController@showactivebunty')->name('active.bounty');
       Route::get('pending/bounty','BountyController@showpendingbunty')->name('pending.bounty');
       Route::get('/closed/bounty','BountyController@showexpiredbunty')->name('closed.bounty');
       Route::post('approve/bounty/{bounty}','BountyController@approve')->name('approve.bounty');
       Route::post('multiple/delete','BountyController@massdelete')->name('mass.bounty.delete');
       Route::get('single/delete/{id}','BountyController@singledelete')->name('single.bounty.delete');
       // Route::get('bounties/show','BountyController@index')->name('admin.bounties.index');
       //gallaery here
       Route::resource('gallery-category','GalleryCategoryController');
       // Route::resource('gallery-image','GalleryImageController');
       Route::post('admin/gallery-image/store/{id}','GalleryImageController@store')->name('gallery-image.store');
       Route::get('admin/gallery-image/{gallery_image}','GalleryImageController@show')->name('gallery-image.show');
       Route::post('admin/gallery-image/{gallery_image}','GalleryImageController@destroy')->name('gallery-image.destroy');

   });


});






 // business section route here

  Route::prefix('business')->namespace('business')->name('business.')->middleware('business')->group(function()
  {

     Route::get('/dashboard','DashboardController@index')->name('dashboard');
     Route::get('/profile','BusinessController@profile')->name('profile');
     Route::post('/profile/update/{id}', 'BusinessController@update')->name('profile.update');
    // business post
     Route::get('/post','BlogController@showpost')->name('post');
     Route::get('/singlepost/{post}','BlogController@singlepost')->name('singlepost');
     Route::get('/post/category/{category}','BlogController@category')->name('post.category');
     Route::resource('/create/posts','CreatePostController');
    //business event
     Route::get('/event','EventController@show')->name('event');
     Route::get('/mark/notification/','EventController@check_read_notification');
     Route::get('/rate','EventController@RatingStore');
     Route::get('/rate/check','EventController@CheckIfAlready');

     Route::get('show/hacker/profile/{id}','EventController@showhackerprofile')->name('show.hacker.profile'); 
     Route::post('post/bounty','BountyController@store')->name('bounty.store');

     Route::get('/report/detail/{id}','EventController@showReportDetails')->name('reports.detail');
     Route::get('/report/delete/{id}','EventController@deletereport')->name('delete.report');
     Route::post('/report/delete/mass','EventController@deleteMassreport')->name('delete.mass-report');  



});

 // business route end here



//post is public so rote is made publuc







// Route::get('/home', 'HomeController@index')->name('home');