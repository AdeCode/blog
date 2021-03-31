<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'App\Http\Controllers\Admin'], function(){
    Route::get('admin/home','HomeController@index')->name('admin.home');

    //Users route
    Route::resource('admin/user','UserController');

    //post routes
    Route::resource('admin/post','PostController');

    //tag routes
    Route::resource('admin/tag','TagController');

    //category routes
    Route::resource('admin/category','CategoryController');    

    //Admin auth routes
    Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
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
