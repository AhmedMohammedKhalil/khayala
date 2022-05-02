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
Route::get('/competition/show', 'HomeController@showCompetition')->name('competitons.show');
Route::get('/doctor/show', 'HomeController@showDoctor')->name('doctorDetails.show');
Route::get('/product/show', 'HomeController@showProduct')->name('productDetails.show');
Route::get('/trainer/show', 'HomeController@showTrainer')->name('trainerDetails.show');


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

    Route::get('/userDetails/show','AdminController@showUser')->name('userDetails.show');


    Route::get('/competitions','CompetitionController@index')->name('competitions');
    Route::get('/competitions/create','CompetitionController@create')->name('competitions.create');
    Route::get('/competitions/edit','CompetitionController@edit')->name('competitions.edit');
    Route::get('/competitions/show','CompetitionController@show')->name('competitions.show');
    Route::get('/competitions/delete','CompetitionController@delete')->name('competitions.delete');
    Route::get('/booking/competition/show','AdminController@showBookingCompetition')->name('booking.competition.show');
    Route::get('/booking/competition/accept','CompetitionController@acceptComp')->name('booking.competition.accept');
    Route::get('/booking/competition/reject','CompetitionController@rejectComp')->name('booking.competition.reject');


});

Route::middleware(['auth:doctor'])->name('doctor.')->prefix('doctor')->group(function () {
    Route::get('/profile','DoctorController@profile')->name('profile');
    Route::get('/settings','DoctorController@settings')->name('settings');
    Route::get('/changePassword','DoctorController@changePassword')->name('changePassword');
    Route::get('/logout','DoctorController@logout')->name('logout');

    Route::get('/userDetails/show','DoctorController@showUser')->name('userDetails.show');


    Route::get('/cases','CasesController@index')->name('cases');
    Route::get('/cases/create','CasesController@create')->name('cases.create');
    Route::get('/cases/edit','CasesController@edit')->name('cases.edit');
    Route::get('/cases/show','CasesController@show')->name('cases.show');
    Route::get('/cases/delete','CasesController@delete')->name('cases.delete');


    Route::get('/bookings','DoctorController@showBooking')->name('bookings');
    Route::get('/bookings/accept','DoctorController@acceptBooking')->name('booking.accept');
    Route::get('/bookings/reject','DoctorController@rejectBooking')->name('booking.reject');



});

Route::middleware(['auth:trainer'])->name('trainer.')->prefix('trainer')->group(function () {
    Route::get('/profile','TrainerController@profile')->name('profile');
    Route::get('/settings','TrainerController@settings')->name('settings');
    Route::get('/changePassword','TrainerController@changePassword')->name('changePassword');
    Route::get('/logout','TrainerController@logout')->name('logout');

    Route::get('/userDetails/show','TrainerController@showUser')->name('userDetails.show');


    Route::get('/works','WorkController@index')->name('works');
    Route::get('/works/create','WorkController@create')->name('works.create');
    Route::get('/works/edit','WorkController@edit')->name('works.edit');
    Route::get('/works/show','WorkController@show')->name('works.show');
    Route::get('/works/delete','WorkController@delete')->name('works.delete');

    Route::get('/products','ProductController@index')->name('products');
    Route::get('/products/create','productController@create')->name('products.create');
    Route::get('/products/edit','ProductController@edit')->name('products.edit');
    Route::get('/products/show','ProductController@show')->name('products.show');
    Route::get('/products/delete','ProductController@delete')->name('products.delete');


    Route::get('/bookings','TrainerController@showBooking')->name('bookings');
    Route::get('/bookings/accept','TrainerController@acceptBooking')->name('booking.accept');
    Route::get('/bookings/reject','TrainerController@rejectBooking')->name('booking.reject');

    Route::get('/orders','TrainerController@showOrders')->name('orders');



});

Route::middleware(['auth:user'])->name('user.')->prefix('user')->group(function () {
    Route::get('/profile','UserController@profile')->name('profile');
    Route::get('/settings','UserController@settings')->name('settings');
    Route::get('/changePassword','UserController@changePassword')->name('changePassword');
    Route::get('/logout','UserController@logout')->name('logout');


    Route::get('/booking/competition','UserController@bookCompetition')->name('booking.competition');
    Route::get('/booking/competition/show','UserController@showBookingCompetition')->name('booking.competition.show');
    Route::get('/booking/doctor','UserController@bookDoctor')->name('booking.doctor');
    Route::get('/booking/doctor/show','UserController@showBookingDoctor')->name('booking.doctor.show');
    Route::get('/booking/trainer','UserController@bookTrainer')->name('booking.trainer');
    Route::get('/booking/trainer/show','UserController@showBookingTrainer')->name('booking.trainer.show');
    Route::get('/buy','UserController@buyProduct')->name('buy');
    Route::get('/buy/products','UserController@showBuyingProducts')->name('buy.products');



});
