<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\indexController;

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
// Route::get('/','indexController@index')->name('index')->middleware('Middlewarelogin');
// Route::get('users/login','indexController@login')->name('login');
// Route::post('users/my_profile','indexController@postlogin')->name('postlogin');

Route::get('/','indexController@index')->name('page.index')->middleware('Middlewarelogin');
Route::get('user/login','indexController@login')->name('page.login');
Route::post('user/post-login','indexController@post_login')->name('post_login');
Route::get('user/logout','indexController@post_logout')->name('logout');





Route::group(['prefix' => 'admin','namespace'=>'admin'], function() {
    Route::get('/','indexController@admin')->name('index');
    Route::post('add','indexController@set_add')->name('set_add');
    Route::get('edit/{id}', 'indexController@set_edit')->name('set_edit');
    Route::post('update/{id}','indexController@update')->name('update');
    Route::get('remove/{id}','indexController@destroy')->name('destroy');
    Route::get('score','indexController@post_score')->name('post_score');
});