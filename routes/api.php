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
});
