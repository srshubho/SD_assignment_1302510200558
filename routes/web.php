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

Route::get('/login', 'authController@index')->name('login');
Route::get('/logout', 'authController@logOut')->name('logout');
Route::post('/login', 'authController@logIn')->name('auth.login');
Route::get('/register', 'authController@create')->name('register');
Route::post('/register', 'authController@register')->name('auth.register');

Route::group(['middleware' => 'checkloggedin'], function () {
    // YOUR ROUTES HERE
    Route::get('/dashboard', function () {
        return view('admin.pages.index');
    })->name('dashboard');
    Route::get('/dashboard/category', 'categoryController@index')->name('dashboard.category.index');
    Route::get('/dashboard/category/create', 'categoryController@create')->name('dashboard.category.add');
    Route::get('/dashboard/category/edit/{category}', 'categoryController@edit')->name('dashboard.category.edit');
    Route::get('/dashboard/category/delete/{category}', 'categoryController@destroy')->name('dashboard.category.delete');
    Route::post('/dashboard/category/store', 'categoryController@store')->name('dashboard.category.store');
    Route::put('/dashboard/category/update/{category}', 'categoryController@update')->name('dashboard.category.update');
    Route::get('/dashboard/product', 'productController@index')->name('dashboard.product.index');
    Route::get('/dashboard/product/create', 'productController@create')->name('dashboard.product.add');
    Route::get('/dashboard/product/edit/{product}', 'productController@edit')->name('dashboard.product.edit');
    Route::get('/dashboard/product/delete/{product}', 'productController@destroy')->name('dashboard.product.delete');
    Route::post('/dashboard/product/store', 'productController@store')->name('dashboard.product.store');
    Route::put('/dashboard/product/update/{product}', 'productController@update')->name('dashboard.product.update');
});
