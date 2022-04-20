<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');


Route::group(['prefix' => 'category', 'middleware' => 'auth:sanctum'], function () {
    Route::post('/store', 'CategoryController@store');
});
Route::group(['prefix' => 'posts', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/list', 'Admin\PostController@list');
    Route::get('/edit/{id}', 'Admin\PostController@edit');
    Route::get('/create', 'Admin\PostController@create');
    Route::post('/store', 'Admin\PostController@store');
    Route::post('/update', 'Admin\PostController@update');
    Route::post('/delete', 'Admin\PostController@delete');
});
Route::group(['prefix' => 'sources', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/source/{post}', 'Admin\SourceController@index');
    Route::post('/delete', 'Admin\SourceController@delete');
    Route::get('/edit/{id}', 'Admin\SourceController@edit');
    Route::post('/update', 'Admin\SourceController@update');
    Route::post('/store', 'Admin\SourceController@store');
});