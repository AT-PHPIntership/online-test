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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/', function(){
	return view('index');
});
Route::group(['prefix' => 'admin', 'namespace' => 'Backend'], function () {

    // Login backend
    Route::get('login', 'AuthController@getLogin');
    Route::post('login', 'AuthController@postLogin');
    Route::get('logout', 'AuthController@getLogout');
    /*Route::group(['middleware' => 'auth:admin'], function () {

        // Dashboard
        Route::get('dashboard', function () {
            return view('backend.dashboard.index');
        })->name('dashboard');
        
        // Business
        Route::resource('business', 'BusinessController');

        // User
        Route::resource('user', 'UserController');

        // Admin
        Route::resource('admins', 'AdminController', ['except' => ['show']]);
        
        // City
        Route::resource('city', 'CityController');

        // Category
        Route::resource('category', 'CategoryController');

        // County
        Route::resource('county', 'CountyController', ['except' => ['show']]);
    });*/
});