<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('v1')->namespace('Api\V1')->name('api.v1.')->group(function () {
    // 用户注册
    Route::resource('users', UserController::class);

    //获取TOKEN
    Route::post('authorizations', 'AuthorizationController@store')->name('authorizations.store');
    //刷新TOKEN
    Route::put('authorizations/current', 'AuthorizationController@update')->name('authorizations.update');
    //删除TOKEN
    Route::delete('authorizations/current', 'AuthorizationController@destroy')->name('authorizations.destroy');

    // 公司执照信息
    Route::get('license', 'SitesController@license')->name('sites.license');
    // 公司横幅列表
    Route::get('banners', 'SitesController@banners')->name('sites.banners');
    // 公司商品列表
    Route::get('products', 'SitesController@products')->name('sites.products');
    // 公司文章列表
    Route::get('articles', 'SitesController@articles')->name('sites.articles');
    // 留言
    Route::post('comment', 'SitesController@addComment')->name('sites.add_comment');

    // 登录后可以访问的接口
    Route::middleware('auth:api')->group(function() {
        // 当前登录用户信息
        Route::get('user', 'UserController@me')
            ->name('user.show');
        // 编辑登录用户信息
        Route::patch('user', 'UserController@update')
            ->name('user.update');
        // 当前用户地址信息
        Route::get('/user_addresses', 'UserAddressController@index')
            ->name('user-addresses.index');
        Route::post('user_addresses', 'UserAddressController@store')->name('user_addresses.store');
        Route::put('user_addresses/{user_address}', 'UserAddressController@update')->name('user_addresses.update');
        Route::delete('user_addresses/{user_address}', 'UserAddressController@destory')->name('user_addresses.delete');

        // 商品收藏
        Route::post('products/{product}/favorite', 'ProductController@favor')->name('products.favor');
        Route::delete('products/{product}/favorite', 'ProductController@disfavor')->name('products.disfavor');
        Route::get('products/favorites', 'ProductController@favorites')->name('products.favorites');
        // 购物车
        Route::post('cart', 'CartController@add')->name('cart.add');
        Route::get('cart', 'CartController@index')->name('cart.index');
        Route::delete('cart/{sku}', 'CartController@remove')->name('cart.remove');
        // 订单
        Route::post('orders', 'OrderController@store')->name('orders.store');
        Route::get('orders', 'OrderController@index')->name('orders.index');
        Route::get('orders/{order}', 'OrderController@show')->name('orders.show');

    });
    // 公司商品详情
    Route::get('products/{product}', 'ProductController@show')->name('products.show');
});
