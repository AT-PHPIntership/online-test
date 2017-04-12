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
/*Route::get('/admin/login', function(){
    return view('backend.layouts.login');
});
Route::get('/admin/dashboard', function(){
    return view('backend.dashboard.index');
});*/

Route::get('/home', 'HomeController@index');

//=========================Backend=======================================
Route::group(['prefix' => 'admin', 'namespace' => 'Backend'], function () {

    // Login backend
    Route::Auth();
    Route::group(['middleware' => 'auth:admin'], function () {

        // Dashboard
        Route::get('dashboard', function () {
            return view('backend.dashboard.index');
        })->name('dashboard');
    });
});
        