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

//=========================Backend=======================================
Route::group(['prefix' => 'admin', 'namespace' => 'Backend'], function () {

    // Dashboard
    Route::get('dashboard', function () {
        return view('backend.dashboard.index');
    })->name('dashboard');

    // User
    Route::resource('user', 'UserController', ['as' => 'admin'], ['only' => [
        'index', 'show'
    ]]);

    // Admin User
    Route::resource('admin-user', 'AdminUserController', ['as' => 'admin'], ['only' => [
    'index', 'edit', 'create', 'store', 'update', 'destroy'
    ]]);

    //Category
    Route::resource('categories', 'CategoryController', ['as' => 'admin']);
    Route::resource('exams', 'ExamController', ['as' => 'admin', 'except' => 'show']);

    // Part
    Route::resource('part', 'PartController', ['as' => 'admin'], ['only' => [
        'index',
    ]]);
    Route::group(['prefix' => 'exams'], function () {
        Route::get('{id}/question/part2/create', 'QuestionController@getCreatePart2')->name('create.part2');
        Route::post('{id}/question/part2/create', 'QuestionController@postCreatePart2')->name('store.part2');
        Route::get('{id}/question/part3/create', 'QuestionController@getCreatePart3')->name('create.part3');
        Route::post('{id}/question/part3/create', 'QuestionController@postCreatePart3')->name('store.part3');
    });
});

// Login backend
Route::group(['namespace' => 'Backend', 'prefix' => 'admin'], function () {
    Route::Auth();
});
