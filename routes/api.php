<?php

use Illuminate\Http\Request;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::resource('users', 'Api\UserController')
    ->only(['index', 'show', 'store', 'destroy']);


Route::resource('posts', 'Api\PostController')
    ->only(['index']);

//Route::prefix('/users')->group(function () {
//
//    Route::get('/', ['uses' => 'UserController@get']);
//    Route::get('/{user_id}', ['uses' => 'UserController@detail'])->where(['user_id' => '[0-9+]']);
//    Route::post('/', ['uses' => 'UserController@create']);
//    Route::delete('/{user_id}', ['uses' => 'UserController@delete'])->where(['user_id' => '[0-9+]']);
//    Route::put('/{user_id}', ['uses' => 'UserController@update'])->where(['user_id' => '[0-9+]']);
//
//});
