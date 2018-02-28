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

Route::group(['middleware'=>'web'],function() {

Route::get('/', function () {
	
    return view('welcome');
});

Route::get('/test', function () {
	
	$data = ['45'];
    return view('test')->with('data', $data );
});


Route::get('/admin','AdminController@index')->name('admin');

Route::post('/form-submit','AdminController@formSubmit')->name('f.submit');

Route::get('/dashboard','AdminController@dashboard')->name('dashboard');

});


