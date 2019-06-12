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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index');
});

Route::get('/shop', function () {
    return view('shop');
});

Route::get('/product-details', function () {
    return view('product-details');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/favourite', function () {
    return view('favourite');
});

Route::get('/discount', function () {
    return view('discount');
});

Route::get('/accesorii', function () {
    return view('accesorii');
});

Route::get('/beds', function () {
    return view('beds');
});

Route::get('/chair', function () {
    return view('chair');
});

Route::get('/product-chair1', function () {
    return view('product-chair1');
});

Route::get('/product-chair2', function () {
    return view('product-chair2');
});

Route::get('/recenzie', function () {
    return view('recenzie');
});

Route::get('/furniture', function () {
    return view('furniture');
});





