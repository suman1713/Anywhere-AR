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

Route::get('/qr', 'PublicController@index');
Route::get('/scene', 'PublicController@scene');
Route::get('/', function () {
    return redirect('admin');
});
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', 'HomeController@index');
        Route::get('/marker', 'MarkerController@index');
        // Route::post('/marker', 'MarkerController@store');
        Route::get('/scene_detail', 'SceneDetailController@index');
        Route::post('/scene_detail', 'SceneDetailController@store');
        Route::get('/scene_detail/edit/{id}', 'SceneDetailController@edit');
        Route::post('/scene_detail/update/{id}', 'SceneDetailController@update');
        Route::get('/scene_detail/delete/{id}', 'SceneDetailController@destroy');
        
        Route::get('/marker/delete/{id}', 'MarkerController@destroy');
        
    });
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

});

// Route::get('createimage', 'FileUploadController@create');
// Route::post('create', 'FileUploadController@store');




// 
// Route::get('signup', 'AuthenticationsController@signup');


// Auth::routes();

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');