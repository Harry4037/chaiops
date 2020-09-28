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
Route::post('/contact', 'HomeController@contactSubmit')->name('site.contact.form');
Route::post('/address', 'HomeController@addressSubmit')->name('site.address.form');
Route::get('/store', 'HomeController@storeList')->name('site.store');

Route::post('/checkout', 'CartController@checkout')->name('site.checkout');
Route::get('/blog', 'BlogController@blog')->name('site.blog');
Route::get('/blog/{id}', 'BlogController@blogDetails');
Route::post('/blog/', 'BlogController@blogComment')->name('site.blog.comment');
Route::get('/franchise', 'HomeController@franchise')->name('site.franchise');
Route::get('/corporate', 'HomeController@corporate')->name('site.corporate');
Route::post('/franchise', 'HomeController@franchiseSubmit')->name('site.franchise.form');
Route::post('/corporate', 'HomeController@corporateSubmit')->name('site.corporate.form');
Route::post('/book', 'HomeController@bookTable')->name('site.book.form');
Route::post('/user-profile', 'HomeController@profileChange')->name('site.profile');


Route::get('/signin', 'LoginController@signin')->name('site.login');
Route::get('/dashboard', 'HomeController@dashboard')->name('site.dashboard');

Route::post('/register', 'LoginController@register')->name('site.signup');
Route::post('/login', 'LoginController@login')->name('site.signin');
Route::get('/logout', 'LoginController@logout')->name('logout');

Route::match(['get', 'post'], '/forgot-password', 'LoginController@forgotPassword')->name('site.forgot');
Route::match(['get', 'post'], '/reset-password/{code?}', 'LoginController@resetPassword')->name('site.reset');

Route::get('/add-to-cart/{id}', 'CartController@addToCart');

Route::get('/cart', 'HomeController@cartPage')->name('site.cart');
Route::post('/add-cart', 'CartController@addCart');
Route::post('/increase-cart-quantity', 'CartController@increaseCartQuantity');
Route::post('/decrease-cart-quantity', 'CartController@decreaseCartQuantity');
Route::post('/delete-cart-product', 'CartController@deleteCartProduct');

Route::patch('update-cart', 'CartController@update');

Route::delete('remove-from-cart', 'CartController@remove');
Route::post('/payment-response', 'CartController@complete')->name('site.payment.response');

Route::namespace('Admin')->prefix('admin')->group(function() {
    Route::match(['get', 'post'], '/', 'LoginController@showLoginForm')->name('admin.login-form');
    Route::match(['get', 'post'], '/login', 'LoginController@login')->name('admin.login');
    Route::post('/logout', 'LoginController@logout')->name('admin.logout');
    Route::match(['get', 'post'], '/forget-password', 'LoginController@forgetPassword')->name('admin.forget-password');
    Route::match(['get', 'post'], '/reset-password/{code}', 'LoginController@resetPassword')->name('admin.reset-password');
});

Route::namespace('Admin')->middleware(['auth'])->prefix('admin')->group(function() {
    Route::match(['get', 'post'], '/change-password', 'LoginController@changePassword')->name('admin.change-password');
    Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');

    Route::prefix('user')->group(function() {
        Route::get('/index', 'UserController@index')->name('admin.user.index');
        Route::get('/list', 'UserController@userList')->name('admin.user.list');
        Route::post('/update-status', 'UserController@userStatus')->name('admin.user.status');
    });

  // Category Routes
  Route::prefix('category')->group(function() {
    Route::get('/', 'CategoryController@index')->name('admin.category.index');
    Route::get('/list', 'CategoryController@categoryList')->name('admin.category.list');
    Route::match(['get', 'post'], '/add', 'CategoryController@categoryAdd')->name('admin.category.add');
    Route::match(['get', 'post'], '/edit/{category}', 'CategoryController@categoryEdit')->name('admin.category.edit');
    Route::post('/delete', 'CategoryController@categoryDelete')->name('admin.category.delete');
    Route::match(['get', 'post'], '/status', 'CategoryController@categoryStatus')->name('admin.category.status');

});

   // Product Routes
   Route::prefix('product')->group(function() {
    Route::get('/', 'ProductController@index')->name('admin.product.index');
    Route::get('/list', 'ProductController@productList')->name('admin.product.list');
    Route::match(['get', 'post'], '/add', 'ProductController@productAdd')->name('admin.product.add');
    Route::match(['get', 'post'], '/edit/{product}', 'ProductController@productEdit')->name('admin.product.edit');
    Route::post('/delete', 'ProductController@productDelete')->name('admin.product.delete');
    Route::match(['get', 'post'], '/status', 'ProductController@productStatus')->name('admin.product.status');
});

  // Blog Routes
  Route::prefix('blog')->group(function() {
    Route::get('/', 'BlogController@index')->name('admin.blog.index');
    Route::get('/list', 'BlogController@blogList')->name('admin.blog.list');
    Route::match(['get', 'post'], '/add', 'BlogController@blogAdd')->name('admin.blog.add');
    Route::match(['get', 'post'], '/edit/{blog}', 'BlogController@blogEdit')->name('admin.blog.edit');
    Route::post('/delete', 'BlogController@blogDelete')->name('admin.blog.delete');
    Route::get('/{blog}/comment-list', 'BlogController@comment')->name('admin.blog.comment-list');
    Route::get('/accept/{id}', 'BlogController@approveStatus')->name('admin.blog.comment.approve');
    Route::get('/reject/{id}', 'BlogController@rejectStatus')->name('admin.blog.comment.reject');  

});

  // Contact Routes
  Route::prefix('contact')->group(function() {
    Route::get('/', 'ContactController@index')->name('admin.contact.index');
    Route::get('/list', 'ContactController@contactList')->name('admin.contact.list');
    Route::get('/view/{contact}', 'ContactController@contactView')->name('admin.contact.view');

});

  // Franchise Routes
  Route::prefix('franchise')->group(function() {
    Route::get('/', 'FranchiseController@index')->name('admin.franchise.index');
    Route::get('/list', 'FranchiseController@franchiseList')->name('admin.franchise.list');
    Route::get('/view/{franchise}', 'FranchiseController@franchiseView')->name('admin.franchise.view');

});

  // Corporate Routes
  Route::prefix('corporate')->group(function() {
    Route::get('/', 'CorporateController@index')->name('admin.corporate.index');
    Route::get('/list', 'CorporateController@corporateList')->name('admin.corporate.list');
    Route::get('/view/{corporate}', 'CorporateController@corporateView')->name('admin.corporate.view');

});

  // Reservation Routes
  Route::prefix('reservation')->group(function() {
    Route::get('/', 'ReservationController@index')->name('admin.reservation.index');
    Route::get('/list', 'ReservationController@reservationList')->name('admin.reservation.list');
    Route::get('/view/{reservation}', 'ReservationController@reservationView')->name('admin.reservation.view');

});

    // Order Routes
    Route::prefix('order')->group(function() {
      Route::get('/', 'OrderController@index')->name('admin.order.index');
      Route::get('/list', 'OrderController@orderList')->name('admin.order.list');
      Route::get('/list/{invoice_id}/{mobile}/{p_type}/{p_status}/{o_status}', 'OrderController@orderList')->name('admin.order.list-params');
      Route::get('/view/{order}', 'OrderController@orderView')->name('admin.order.view');
      Route::post('/update-status', 'OrderController@acceptStatus')->name('admin.order.update-status');
      Route::post('/complete', 'OrderController@markComplete')->name('admin.order.mark-complete');
      Route::post('/cancel', 'OrderController@cancelOrder')->name('admin.order.cancel');
  });

    // Store List Routes
    Route::prefix('store')->group(function() {
      Route::get('/', 'StoreController@index')->name('admin.store.index');
      Route::get('/list', 'StoreController@storeList')->name('admin.store.list');
      Route::match(['get', 'post'], '/add', 'StoreController@storeAdd')->name('admin.store.add');
      Route::match(['get', 'post'], '/edit/{store}', 'StoreController@storeEdit')->name('admin.store.edit');
      Route::post('/delete', 'StoreController@storeDelete')->name('admin.store.delete');
      Route::match(['get', 'post'], '/status', 'StoreController@storeStatus')->name('admin.store.status');
  
  });

});
