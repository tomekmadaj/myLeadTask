<?php

use Illuminate\Support\Facades\Auth;
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
    return redirect()->route('product.list');
});

Route::group([
    'prefix' => 'products',
    'as' => 'product.'
], function () {
    Route::get('/', 'ProductController@list')
        ->name('list');
    Route::get('/{productId}', 'ProductController@show')
        ->name('show');
});

Route::group([
    'prefix' => 'edit',
    'as' => 'product.',
    'middleware' => 'auth'
], function () {
    Route::get('/', 'ProductController@editList')
        ->name('edit.list');
    Route::post('/', 'ProductController@add')
        ->name('add');
    Route::delete('/', 'ProductController@delete')
        ->name('delete');
    Route::get('/{productId}', 'ProductController@edit')
        ->name('edit');
    Route::post('/{productId}', 'ProductController@update')
        ->name('update');
});


Auth::routes();
