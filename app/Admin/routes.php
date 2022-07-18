<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Dcat\Admin\Admin;

Admin::routes();

Route::group([
    'prefix'     => config('admin.route.prefix'),
    'namespace'  => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('users', UserController::class);
    $router->resource('products', ProductController::class);
    $router->resource('licenses', LicenseController::class);
    $router->resource('mails', MailController::class);
    $router->resource('banners', BannerController::class);
    $router->resource('article-categories', ArticleCategoryController::class);
    $router->resource('articles', ArticleController::class);
    $router->resource('product-categories', ProductCategoryController::class);
    $router->resource('sites', SiteController::class);
    $router->resource('comments', CommentController::class);

});
