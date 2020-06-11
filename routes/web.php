<?php

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


// Admin routes
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
    Route::get('/', 'DashboardController@index');
    Route::get('login', 'LoginController@index');

    Route::get('userRequests', 'UserRequestsController@index');
    Route::get('userRequests/update', 'UserRequestsController@update')->name('userRequest.update');

    Route::post('userRequests/update', 'UserRequestsController@update');


    Route::get('/events', 'EventsController@index')->name('event.index');
    Route::get('/events/create', 'EventsController@create')->name('events.create');
    Route::get('/events/edit/{id}', 'EventsController@edit')->name('events.edit');
    Route::get('/events/update/{id}', 'EventsController@update')->name('events.update');
    Route::get('/events/delete/{id}', 'EventsController@destroy')->name('events.delete');

    Route::post('/events/create', 'EventsController@store');
    Route::post('/events/update/{id}', 'EventsController@update');
    Route::post('/events/delete/{id}', 'EventsController@destroy');


//    Route::post('login', 'LoginController@login')->name('admin.login');
});

// Site routes
Route::group(['namespace' => 'Site'], function() {
    Route::get('/', 'HomeController@index');

    Route::get('userRequests/create', 'UserRequestsController@store')->name('userRequest.create');

    Route::post('userRequests/create', 'UserRequestsController@store');
});
