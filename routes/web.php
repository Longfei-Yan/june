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

//Route::prefix('Web')->group(['middleware'=>'setTheme:ADMIN_THEME'], function() {
//
//});

Route::group(['namespace' => 'Web', 'middleware'=>'setTheme:WEB_THEME'], function() {
    //首页
    Route::get('/', 'HomeController@index')->name('/');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/index', 'HomeController@index')->name('index');

    //认证
    Route::get('/login', 'AuthorizationController@create')->name('auth.create');
    Route::post('/login', 'AuthorizationController@store')->name('auth.store');
    Route::delete('/logout', 'AuthorizationController@destroy')->name('auth.destroy');

    //用户
    Route::get('/register', 'UserController@create')->name('register');
    Route::post('/register', 'UserController@store')->name('register');
    Route::get('/my-account', 'UserController@myAccount')->middleware('auth')->name('my-account');

    //用户resource
    Route::get('/users/create', 'UserController@crate')->name('users.create');
    Route::post('/users', 'UserController@store')->name('users.store');
    Route::get('/users', 'UserController@index')->middleware('auth')->name('users.index');
    Route::get('/users/{user}', 'UserController@show')->middleware('auth')->name('users.show');
    Route::get('/users/{user}/edit', 'UserController@edit')->middleware('auth')->name('users.edit');
    Route::patch('/users/{user}', 'UserController@update')->middleware('auth')->name('users.update');
    Route::delete('/users/{user}', 'UserController@destroy')->middleware('auth')->name('users.destroy');

    //用户地址
    Route::get('/user-addresses', 'UserAddressController@index')->middleware('auth')->name('user-addresses.index');


    //商品
    Route::get('/products', 'ProductController@index')->name('products');
    Route::get('/products/{id}', 'ProductController@show')->name('product');

    //服务或隐私政策
    Route::get('/services', 'ServiceController@index')->name('services');
    Route::get('/about', 'AboutController@index')->name('about');
    Route::get('/contact', 'ContactController@index')->name('contact');
    Route::post('/contact', 'ContactController@store')->name('contact');
    Route::get('/cart', 'CartController@index')->middleware('auth')->name('cart');
    Route::get('/checkout', 'CheckoutController@index')->middleware('auth')->name('checkout');

    Route::fallback(function(){
        return response()->view('404', [], 404);
    });
});
