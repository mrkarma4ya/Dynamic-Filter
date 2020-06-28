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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('categories','Api\CategoryController');

// Route::get('categories','Api\CategoryController@index');
// Route::get('categories{category}','Api\CategoryController@show');
// Route::post('categories','Api\CategoryController@store');
// Route::PUT('categories/{category}','Api\CategoryController@update');
// Route::DELETE('categories/{category}','Api\CategoryController@destroy');

Route::get('products','Api\ProductController@index');


