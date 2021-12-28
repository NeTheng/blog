<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


// public route
Route::get('/', function () {
    return view('welcome');
});
// End public route

// Route Auth
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


/**
 * User Routes
 */

Route::group(['middleware' => ['auth', 'permission']], function () {
Route::group(['prefix' => 'users'], function () {
    Route::get('/', 'UsersController@index')->name('users.index');
    Route::get('/create', 'UsersController@create')->name('users.create');
    Route::post('/create', 'UsersController@store')->name('users.store');
    Route::get('/{user}/show', 'UsersController@show')->name('users.show');
    Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
    Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
    Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
});

});

Route::group(['middleware' => ['auth', 'permission']], function () {
    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', 'PostsController@index')->name('posts.index');
        Route::get('/create', 'PostsController@create')->name('posts.create');
        Route::post('/create', 'PostsController@store')->name('posts.store');
        Route::get('/{post}/show', 'PostsController@show')->name('posts.show');
        Route::get('/{post}/edit', 'PostsController@edit')->name('posts.edit');
        Route::patch('/{post}/update', 'PostsController@update')->name('posts.update');
        Route::delete('/{post}/delete', 'PostsController@destroy')->name('posts.destroy');
    });

    Route::resource('roles', RolesController::class);
    Route::resource('permissions', PermissionsController::class);
});




// Province
Route::group(['prefix' => 'province'], function () {
    Route::get('/', 'ProvinceController@index')->name('province.index');
    Route::get('/create', 'ProvinceController@create')->name('province.create');
    Route::post('/create', 'ProvinceController@store')->name('province.store');
    Route::get('/{province}/show', 'ProvinceController@show')->name('province.show');
    Route::get('/{province}/edit', 'ProvinceController@edit')->name('province.edit');
    Route::patch('/{province}/update', 'ProvinceController@update')->name('province.update');
    Route::delete('/{province}/delete', 'ProvinceController@destroy')->name('province.destroy');
});


// District
Route::group(['prefix' => 'district'], function () {
    Route::get('/', 'DistrictController@index')->name('district.index');
    Route::get('/create', 'DistrictController@create')->name('district.create');
    Route::post('/create', 'DistrictController@store')->name('district.store');
    Route::get('/{district}/show', 'DistrictController@show')->name('district.show');
    Route::get('/{district}/edit', 'DistrictController@edit')->name('district.edit');
    Route::patch('/{district}/update', 'DistrictController@update')->name('district.update');
    Route::delete('/{district}/delete', 'DistrictController@destroy')->name('district.destroy');
});

// District
Route::group(['prefix' => 'commune'], function () {
    Route::get('/', 'CommuneController@index')->name('commune.index');
    Route::get('/create', 'CommuneController@create')->name('commune.create');
    Route::post('/create', 'CommuneController@store')->name('commune.store');
    Route::get('/{commune}/show', 'CommuneController@show')->name('commune.show');
    Route::get('/{commune}/edit', 'CommuneController@edit')->name('commune.edit');
    Route::patch('/{commune}/update', 'CommuneController@update')->name('commune.update');
    Route::delete('/{commune}/delete', 'CommuneController@destroy')->name('commune.destroy');
});


// Route Roles & Permission Access in Controller
Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::group(['middleware' => ['auth', 'permission']], function () {
    });
});