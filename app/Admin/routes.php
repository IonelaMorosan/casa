<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'ListingController@index');

    $router->resources([
        'category'                  => CategoryController::class,
        'listings'                  => ListingController::class,
    ]);
});
