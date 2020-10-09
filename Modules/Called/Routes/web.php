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

Route::prefix('called')->middleware('web', 'auth')->group(function() {
    Route::get('/', 'CalledController@index')->name('called.index');
    Route::get('/create', 'CalledController@create')->name('called.create');
    Route::post('/store', 'CalledController@store')->name('called.store');
    Route::get('/show/{id}', 'CalledController@show')->name('called.show');
    Route::get('/edit/{id}', 'CalledController@edit')->name('called.edit');
    Route::put('/update', 'CalledController@update')->name('called.update');
    Route::delete('/delete/{id}', 'CalledController@destroy')->name('called.destroy');
    Route::post('/finish', 'CalledController@finish')->name('called.finish');
});
