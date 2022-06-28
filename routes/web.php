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
    Route::get('/products', 'ProductController@index')->name('products.index');
    Route::get('/products/{product}', 'ProductController@show')->name('products.show');

    Route::post('products/{product}/favorite', 'ProductController@favor')->middleware('auth')->name('products.favor');
    Route::delete('products/{product}/favorite', 'ProductController@disfavor')->middleware('auth')->name('products.disfavor');
    Route::get('/wishlists', 'ProductController@wishlists')->middleware('auth')->name('products.wishlists');

    //服务或隐私政策
    Route::get('/services', 'ServiceController@index')->name('services.index');
    //关于我们
    Route::get('/about', 'AboutController@index')->name('about.index');
    //联系
    Route::get('/contact', 'ContactController@index')->name('contact.index');
    Route::post('/contact', 'ContactController@store')->name('contact.store');
    //购物车
    Route::get('/cart', 'CartController@index')->middleware('auth')->name('cart.index');
    Route::post('/cart', 'CartController@add')->middleware('auth')->name('cart.add');
    Route::delete('/cart/{sku}', 'CartController@remove')->middleware('auth')->name('cart.remove');
    Route::delete('/cart', 'CartController@removeAll')->middleware('auth')->name('cart.removeAll');

    //结账
    Route::get('/checkout', 'CheckoutController@index')->middleware('auth')->name('checkout.index');
    Route::post('/orders', 'OrdersController@store')->middleware('auth')->name('orders.store');
    //404
    Route::fallback(function(){
        return response()->view('404', [], 404);
    });
});
