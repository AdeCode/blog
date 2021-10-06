<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::group(['namespace' => 'App\Http\Controllers\User'], function(){
    Route::get('/','HomeController@index');
    Route::get('/post/{post}','PostController@post')->name('post');
    Route::get('post/tag/{tag}','HomeController@tag')->name('tag');
    Route::get('post/category/{category}','HomeController@category')->name('category'); 
});

Route::get('admin-login',[App\Http\Controllers\Admin\Auth\LoginController::class,'showLoginForm'])->name('adminLoginPost');

Route::post('admin-login',[App\Http\Controllers\Admin\Auth\LoginController::class,'login'])->name('adminLoginPost');

Route::group(['namespace' => 'App\Http\Controllers\Admin','middleware' => 'auth:admin'], function(){
    //adminroutes
    Route::get('admin/home','HomeController@index')->name('admin.home');

    //Users route
    Route::resource('admin/user','UserController');

    //post routes
    Route::resource('admin/post','PostController');

    //tag routes
    Route::resource('admin/tag','TagController');

    //role routes
    Route::resource('admin/role','RoleController');

    //category routes
    Route::resource('admin/category','CategoryController');    

    //Admin auth routes
    // Route::get('admin-login','Auth\LoginController@showLoginForm')->name('adminLoginPost');

    // Route::post('admin-login','Auth\LoginController@login')->name('adminLoginPost');

});

Route::group(['namespace' => 'App\Http\Controllers\Auth'], function(){
    
    //Route::post('admin-logout', 'AdminAuthController@logout')->name('adminLogout');
    Route::middleware(['auth:admin'])->group(function() {
        //Route::get('admin-login', 'AdminAuthController@showLoginForm')->name('admin.login');
    
        //Route::post('admin-login', 'AdminAuthController@postLogin')->name('adminLoginPost');
    
    });
    
});


Route::group(['prefix' => 'admin','middleware' => 'auth'], function () {
	// Admin Dashboard
	Route::get('dashboard','AdminController@dashboard')->name('dashboard');	
});



// Route::get('/post', function () {
//     return view('user.post');
// })->name('post');

// Route::get('admin/home', function () {
//     return view('admin.home');
// });

// Route::get('admin/post', function () {
//     return view('admin.posts.post');
// });

// Route::get('admin/tag', function () {
//     return view('admin.tag.tag');
// });

// Route::get('admin/category', function () {
//     return view('admin.category.category');
// });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
