<?php

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{
    Route::get('/admin', 'CategoryController@index');
    Route::resource('categories', 'CategoryController');
    Route::resource('categories.courses', 'CourseController');
    Route::resource('courses.registrations', 'RegistrationController');
    Route::resource('registrations.payments', 'PaymentController');
    
    Route::get('api/categories', 'CategoryController@api');
    Route::get('category/status/{id}', 'CategoryController@status');
    Route::get('category/destroy/{id}', 'CategoryController@destroy');
    
    Route::get('api/courses/{category}', 'CourseController@api');
    Route::get('course/status/{id}', 'CourseController@status');
    Route::get('course/destroy/{id}', 'CourseController@destroy');
    
    Route::get('api/registrations/{courses}', 'RegistrationController@api');
    Route::get('registration/status/{id}', 'RegistrationController@status');
    Route::get('registration/destroy/{id}', 'RegistrationController@destroy');
    
    Route::get('pagos', 'PaymentController@pagos')->name('pagos');
    Route::get('api/payments/{registrations}', 'PaymentController@api');
    Route::get('payment/status/{id}', 'PaymentController@status');
    Route::get('payment/destroy/{id}', 'PaymentController@destroy');
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('categoria/{id}/cursos', 'HomeController@cursos');
Route::get('curso/{id}', 'HomeController@curso');

Route::get('curso/{id}/inscripcion', 'ProfileController@inscripcion')->name('inscripcion');
Route::post('inscribir/{id}', 'ProfileController@inscribir')->name('inscribir');
Route::get('misinscripciones', 'ProfileController@misinscripciones')->name('misinscripciones');
Route::get('eliminarinscripcion/{id}', 'ProfileController@eliminarinscripcion')->name('eliminarinscripcion');

Route::group(['middleware' => 'App\Http\Middleware\OwnerMiddleware'], function()
{
    Route::get('mispagos/{id}', 'ProfileController@mispagos')->name('mispagos');
    Route::get('pago/{id}', 'ProfileController@pago')->name('pago');
    Route::post('pagar/{id}', 'ProfileController@pagar')->name('pagar');
    Route::get('eliminarpago/{id}', 'ProfileController@eliminarpago')->name('eliminarpago');
});

Route::auth();