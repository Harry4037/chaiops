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

Route::get('/', 'HomeController@index')->name('site.index');
Route::get('/menu', 'HomeController@menuPage')->name('site.menu');
Route::get('/about', 'HomeController@aboutPage')->name('site.about');
Route::get('/store', 'HomeController@storePage')->name('site.store');
Route::get('/contact', 'HomeController@contactPage')->name('site.contact');
Route::get('/cart', 'HomeController@cartPage')->name('site.cart');
Route::post('/checkout', 'CartController@checkout');
Route::get('/blog', 'BlogController@blog')->name('site.blog');
Route::get('/blog/{id}', 'BlogController@blogDetails');
Route::get('/franchise', 'HomeController@franchise')->name('site.franchise');
Route::post('/franchise', 'HomeController@franchiseSubmit');


Route::get('/signin', 'LoginController@signin')->name('site.login');
Route::get('/dashboard', 'HomeController@dashboard')->name('site.dashboard');

Route::post('/register', 'LoginController@register')->name('site.signup');
Route::post('/login', 'LoginController@login')->name('site.signin');
Route::get('/logout', 'LoginController@logout')->name('logout');

Route::match(['get', 'post'], '/forgot-password', 'LoginController@forgotPassword')->name('site.forgot');
Route::match(['get', 'post'], '/reset-password/{code?}', 'LoginController@resetPassword')->name('site.reset');

Route::get('/add-to-cart/{id}', 'CartController@addToCart');

Route::patch('update-cart', 'CartController@update');

Route::delete('remove-from-cart', 'CartController@remove');

Route::namespace('Admin')->prefix('admin')->group(function() {
    Route::match(['get', 'post'], '/', 'LoginController@showLoginForm')->name('admin.login-form');
    Route::match(['get', 'post'], '/login', 'LoginController@login')->name('admin.login');
    Route::post('/logout', 'LoginController@logout')->name('admin.logout');
    Route::match(['get', 'post'], '/forget-password', 'LoginController@forgetPassword')->name('admin.forget-password');
    Route::match(['get', 'post'], '/reset-password/{code}', 'LoginController@resetPassword')->name('admin.reset-password');
});

Route::namespace('Admin')->middleware(['auth'])->prefix('admin')->group(function() {
    Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
    
    Route::prefix('user')->group(function() {
        Route::get('/index', 'UserController@index')->name('admin.user.index');
        Route::get('/list', 'UserController@userList')->name('admin.user.list');
        Route::post('/update-status', 'UserController@userStatus')->name('admin.user.status');
    });
});
