<?php

use Illuminate\Support\Facades\Route;

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

//Route Backend

Auth::routes();
Route::get('/', function () {
    return redirect()->route('home');
});
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>['auth','checkRole:admin'],'prefix'=>'admin'],function(){
    
    Route::get('/', 'Admin\HomeController@index')->name('admin');
    Route::get('/user', 'Admin\UserController@index')->name('admin.user');    
});
Route::group(['middleware'=>['auth','checkRole:user,userplus']],function(){
    Route::get('profile/{req}', 'User\UserController@detail')->name('user.detail');
    });

//Route Frontend
