<?php



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


Route::post('login', 'API\UserController@login');

Route::post('register', 'API\UserController@register');

Route::group(['middleware' => 'auth:api'], function(){

    Route::get('course', 'API\CourseController@index');

    Route::get('course/{id}', 'API\CourseController@show');

    Route::post('course', 'API\CourseController@store');

    Route::put('course/{id}', 'API\CourseController@update');

    Route::delete('course/{id}', 'API\CourseController@delete');

});