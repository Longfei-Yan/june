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
    Route::get('banners', 'SitesController@banners')->name('sites.banners');
    Route::get('products', 'SitesController@products')->name('sites.products');
    Route::get('articles', 'SitesController@articles')->name('sites.articles');
    Route::get('products/{product}', 'ProductController@show')->name('products.show');

    // 登录后可以访问的接口
    Route::middleware('auth:api')->group(function() {
        // 当前登录用户信息
        Route::get('user', 'UserController@me')
            ->name('user.show');
        // 编辑登录用户信息
        Route::patch('user', 'UserController@update')
            ->name('user.update');
        // 当前用户地址信息
        Route::get('/user-addresses', 'UserAddressController@index')
            ->name('user-addresses.index');

        //商品收藏
        Route::post('products/{product}/favorite', 'ProductController@favor')->name('products.favor');
        Route::delete('products/{product}/favorite', 'ProductController@disfavor')->name('products.disfavor');
        // 购物车
        Route::post('cart', 'CartController@add')->name('cart.add');
        Route::get('cart', 'CartController@index')->name('cart.index');
        Route::delete('cart/{sku}', 'CartController@remove')->name('cart.remove');

    });
});
