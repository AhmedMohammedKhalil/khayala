<?php

use GuzzleHttp\Middleware;
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




Route::get('/', 'HomeController@index')->name('home');
Route::get('/competition', 'HomeController@competition')->name('competitons');
Route::get('/search','HomeController@search')->name('search');

Route::middleware(['guest:admin', 'guest:user', 'guest:doctor', 'guest:trainer'])->group(function () {
    Route::get('/admin/login', 'AdminController@showLogin')->name('admin.login');
    Route::get('/user/login', 'UserController@showLogin')->name('user.login');
    Route::get('/user/register', 'UserController@showRegister')->name('user.register');
    Route::get('/doctor/login', 'DoctorController@showLogin')->name('doctor.login');
    Route::get('/doctor/register', 'DoctorController@showRegister')->name('doctor.register');
    Route::get('/trainer/login', 'TrainerController@showLogin')->name('trainer.login');
    Route::get('/trainer/register', 'TrainerController@showRegister')->name('trainer.register');
});


Route::middleware(['auth:admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/dashboard','AdminController@dashboard')->name('dashboard');
    Route::get('/profile','AdminController@profile')->name('profile');
    Route::get('/settings','AdminController@settings')->name('settings');
    Route::get('/changePassword','AdminController@changePassword')->name('changePassword');

    Route::get('/logout','AdminController@logout')->name('logout');
});

Route::middleware(['auth:doctor'])->name('doctor.')->prefix('doctor')->group(function () {
    Route::get('/profile','DoctorController@profile')->name('profile');
    Route::get('/settings','DoctorController@settings')->name('settings');
    Route::get('/changePassword','DoctorController@changePassword')->name('changePassword');

    Route::get('/logout','DoctorController@logout')->name('logout');

});

Route::middleware(['auth:trainer'])->name('trainer.')->prefix('trainer')->group(function () {
    Route::get('/profile','TrainerController@profile')->name('profile');
    Route::get('/settings','TrainerController@settings')->name('settings');
    Route::get('/changePassword','TrainerController@changePassword')->name('changePassword');
    Route::get('/logout','TrainerController@logout')->name('logout');

});

Route::middleware(['auth:user'])->name('user.')->prefix('user')->group(function () {
    Route::get('/profile','UserController@profile')->name('profile');
    Route::get('/settings','UserController@settings')->name('settings');
    Route::get('/changePassword','UserController@changePassword')->name('changePassword');

    Route::get('/logout','UserController@logout')->name('logout');

});
