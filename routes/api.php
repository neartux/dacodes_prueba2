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

    Route::get('course/{course_id}/lesson', 'API\LessonController@index');

    Route::get('course/{course_id}/lesson/{lesson_id}', 'API\LessonController@show');

    Route::post('course/{course_id}/lesson', 'API\LessonController@store');

    Route::put('course/{course_id}/lesson/{lesson_id}', 'API\LessonController@update');

    Route::delete('course/{course_id}/lesson/{lesson_id}', 'API\LessonController@delete');

    Route::get('course/{course_id}/lesson/{lesson_id}/question', 'API\QuestionController@index');

    Route::get('course/{course_id}/lesson/{lesson_id}/question/{question_id}', 'API\QuestionController@show');

    Route::post('course/{course_id}/lesson/{lesson_id}/question', 'API\QuestionController@store');

    Route::put('course/{course_id}/lesson/{lesson_id}/question/{question_id}', 'API\QuestionController@update');

    Route::delete('course/{course_id}/lesson/{lesson_id}/question/{question_id}', 'API\QuestionController@delete');


});