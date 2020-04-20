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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/api/clients', function () {
    return view('api.index');
});

Route::group(['namespace' => 'Api', 'prefix' => 'api', 'as' => 'api.'], function () {
    Route::group(['as' => 'products.'], function () {
        Route::get('products/list', 'ProductController@getList')->name('list');
        Route::get('products/{id}', 'ProductController@getProduct')->where('id', '[0-9]+')->name('product');
        Route::post('products/new', 'ProductController@newProduct')->name('new');
        Route::patch('products/edit', 'ProductController@editProduct')->name('edit');
    });

    Route::group(['as' => 'categories.'], function () {
        Route::get('categories/list', 'CategoryController@getList')->name('list');
        Route::get('categories/{id}', 'CategoryController@getCategory')->name('category');
        Route::post('categories/new', 'CategoryController@newCategory')->name('new');
        Route::patch('categories/edit', 'CategoryController@editCategory')->name('edit');
    });
});

Route::get('api/form', 'Api\BaseController@index');
