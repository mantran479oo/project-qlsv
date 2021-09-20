<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes Student
|--------------------------------------------------------------------------
|**/

Route::get('/', 'indexController@index')->name('students.index');
Route::get('user/login', 'indexController@login')->name('students.login');
Route::post('user/post-login', 'indexController@postLogin')->name('students.post_login');
Route::get('user/logout', 'indexController@postLogout')->name('students.logout');


/*
|--------------------------------------------------------------------------
| Web Routes Admin
|--------------------------------------------------------------------------
|*/

Route::group(['prefix' => 'admin', 'namespace' => 'admin'], function () {
    Route::get('/', 'indexController@admin')->name('admin.index');
    Route::post('add', 'indexController@setAdd')->name('admin.set_add');
    Route::get('edit/{id}', 'indexController@setEdit')->name('admin.set_edit');
    Route::post('update/{id}', 'indexController@update')->name('admin.update');
    Route::get('remove/{id}', 'indexController@destroy')->name('admin.destroy');
    Route::get('score', 'indexController@postScore')->name('admin.update_score');
});
