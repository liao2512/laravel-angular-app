<?php

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{
    Route::get('/admin', 'CategoryController@index');
    Route::resource('categories', 'CategoryController');
    Route::resource('categories.courses', 'CourseController');
    Route::resource('courses.registrations', 'RegistrationController');
    
    Route::get('api/categories', 'CategoryController@api');
    Route::get('category/status/{id}', 'CategoryController@status');
    Route::get('category/destroy/{id}', 'CategoryController@destroy');
    
    Route::get('api/courses/{category}', 'CourseController@api');
    Route::get('course/status/{id}', 'CourseController@status');
    Route::get('course/destroy/{id}', 'CourseController@destroy');  
});

Route::get('/', 'HomeController@index');
Route::get('categoria/{id}/cursos', 'HomeController@cursos');
Route::get('curso/{id}', 'HomeController@curso');

Route::get('curso/{id}/inscripcion', 'ProfileController@inscripcion')->name('inscripcion');
Route::post('inscribir/{id}', 'ProfileController@inscribir')->name('inscribir');
Route::get('misinscripciones', 'ProfileController@misinscripciones')->name('misinscripciones');
Route::get('mispagos', 'ProfileController@mispagos')->name('mispagos');


Route::auth();



//Borrar este route
Route::get('/home', 'CategoryController@index');