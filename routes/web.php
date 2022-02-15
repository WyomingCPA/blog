<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();

Route::get('/', ['as' => 'blog.index', 'uses' => 'BlogController@index', 'middleware' => ['auth', 'can:isAdmin']],);
Route::get('/post/{post}', ['as' => 'blog.view', 'uses' => 'BlogController@view', 'middleware' => ['auth', 'can:isAdmin']],);

Route::get('/{category}', ['as' => 'blog.category', 'uses' => 'BlogController@category']);

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'can:isAdmin']], function () {
    Route::get('/', ['as' => 'admin.index', 'uses' => 'AdminController@index']);
    Route::group(['prefix' => 'category',], function () {
        Route::get('create', ['as' => 'category.create', 'uses' => 'CategoryController@create']);
        Route::get('index', ['as' => 'category.index', 'uses' => 'CategoryController@index']);
        Route::post('store', ['as' => 'category.store', 'uses' => 'CategoryController@store']);
        Route::get('edit/{category}', ['as' => 'category.edit', 'uses' => 'CategoryController@edit']);
        Route::post('update/{category}', ['as' => 'category.update', 'uses' => 'CategoryController@update']);
        Route::post('delete/{category}', ['as' => 'category.delete', 'uses' => 'CategoryController@delete']);
    });
    Route::group(['prefix' => 'post',], function () {
        Route::get('index', ['as' => 'post.index', 'uses' => 'PostController@index']);
        Route::get('detail/{post}', ['as' => 'post.detail', 'uses' => 'PostController@detail']);
        Route::get('create', ['as' => 'post.create', 'uses' => 'PostController@create']);
        Route::get('edit/{post}', ['as' => 'post.edit', 'uses' => 'PostController@edit']);
        Route::post('store', ['as' => 'post.store', 'uses' => 'PostController@store']);
        Route::post('update/{post}', ['as' => 'post.update', 'uses' => 'PostController@update']);
        Route::post('delete/{post}', ['as' => 'post.delete', 'uses' => 'PostController@delete']);
        Route::post('save/{post}', ['as' => 'post.image.save', 'uses' => 'UploadImageController@save']);
    });
    Route::group(['prefix' => 'sources',], function () {
        Route::get('{post}', ['as' => 'sources.index', 'uses' => 'SourceController@view']);
        Route::get('create/{post}', ['as' => 'sources.create', 'uses' => 'SourceController@create']);
        Route::get('edit/{source}', ['as' => 'sources.edit', 'uses' => 'SourceController@edit']);
        Route::post('update/{source}', ['as' => 'sources.update', 'uses' => 'SourceController@update']);
        Route::post('store/{post}', ['as' => 'sources.store', 'uses' => 'SourceController@store']);
        Route::post('delete/{source}', ['as' => 'sources.delete', 'uses' => 'SourceController@delete']);
    });
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
