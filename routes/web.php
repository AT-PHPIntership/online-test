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
Route::group(['prefix' => 'admin','middleware' => 'auth:admin', 'namespace' => 'Backend'], function () {


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
        Route::get('{examId}/question/part1/create', 'QuestionController@createPart1')->name('admin.questions.create.part1');
        Route::post('{examId}/question/part1/store', 'QuestionController@storePart1')->name('admin.questions.store.part1');
        Route::get('{examId}/question/part2/create', 'QuestionController@createPart2')->name('admin.questions.create.part2');
        Route::post('{examId}/question/part2/store', 'QuestionController@storePart2')->name('admin.questions.store.part2');
        Route::get('{examId}/question/part3/create', 'QuestionController@createPart3')->name('admin.questions.create.part3');
        Route::post('{examId}/question/part3/store', 'QuestionController@storePart3')->name('admin.questions.store.part3');
        Route::get('{examId}/question/part4/create', 'QuestionController@createPart4')->name('admin.questions.create.part4');
        Route::post('{examId}/question/part4/store', 'QuestionController@storePart4')->name('admin.questions.store.part4');
        Route::get('{examId}/question/part5/create', 'QuestionController@createPart5')->name('admin.questions.create.part5');
        Route::post('{examId}/question/part5/store', 'QuestionController@storePart5')->name('admin.questions.store.part5');
        Route::get('{examId}/question/part6/create', 'QuestionController@createPart6')->name('admin.questions.create.part6');
        Route::post('{examId}/question/part6/store', 'QuestionController@storePart6')->name('admin.questions.store.part6');
        Route::get('{examId}/question/part7/create', 'QuestionController@createPart7')->name('admin.questions.create.part7');
        Route::post('{examId}/question/part7/store', 'QuestionController@storePart7')->name('admin.questions.store.part7');
    });
});
// Login backend
Route::group(['namespace' => 'Backend', 'prefix' => 'admin'], function () {
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\LoginController@login')->name('admin.login');
    Route::post('/logout', 'Auth\LoginController@logout')->name('admin.logout');
    Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.reset');
});

//=======================================Frontend=======================================================
Route::group(['namespace'=>'Frontend'], function () {

    Route::Auth();
    Route::get('/', 'IndexController@index')->name('home');
    Route::group(['prefix' => 'exams','middleware' => 'auth:web'], function () {
        Route::get('{examId}/listening', 'ExamController@listening')->name('exams.listening');
        Route::post('{examId}/storeListening', 'ExamController@storeListening')->name('exams.storeListening');
        Route::get('{examId}/reading/', 'ExamController@reading')->name('exam.reading');
        Route::post('{examId}/reading', 'ExamController@storeReading')->name('exam.storeReading');
        Route::get('exams/{Id}/result', 'ExamController@resultTest')->name('result.test');
    });
});
