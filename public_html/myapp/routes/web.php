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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/{number}','AdminController@index');

Route::get('/test',function($number,$second = ''){
    echo 'first number is: '.$number;
    echo '<br />';
    echo 'second number is: '.$second;
})->name('test');

Route::get('/testregx/{number}/{second?}',function($number){
    echo  'number is: '.$number;
})->where(array('number'=>'[0-9]+'));

Route::get('/testa',function(){
    echo url('admin',[1234]);
    echo route('test',['id'=>12,'ad'=>25]);    
});

Route::get('/testb/{number}',array(
    'as' => 'testb',
    'uses' => 'AdminController@index',
    'middleware'=> 'web'
));

Route::get('admin/dashboard','AdminController@dashboard');

Route::group(array('middleware'=>'web','prefix'=>'admin-panel'),function(){
    Route::get('/dashboard',array(
        'as' => 'dashboard',
        'uses' => 'AdminController@dashboard'
    ));
    Route::get('/profile',array(
        'as' => 'profile',
        'uses' => 'AdminController@dashboard'
    ));
});

Route::get('/testc',function(){
    echo route('dashboard');
    echo "<br/>";
    echo route('profile');
    
});

Route::any('/testd',function(){
    echo 'hello test d';
});

Route::match(array('put','patch'),'/testd',function(){});

Route::get('teste','TestController@index');

Route::get('/about', function () {
	$data['name'] = 'Charan Singh';
    return view('about',$data);
});