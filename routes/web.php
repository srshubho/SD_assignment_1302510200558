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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('admin.pages.index');
});
Route::get('/dashboard/category/create', 'categoryController@create')->name('dashboard.category.add');
Route::get('/dashboard/category', 'categoryController@index')->name('dashboard.category.index');
Route::post('/dashboard/category/store', 'categoryController@store')->name('dashboard.category.store');