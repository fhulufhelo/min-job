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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/seeker', 'SProfileController')->middleware('auth');

Route::resource('/employer', 'EProfileController')->middleware('auth');

Route::resource('/logo', 'LogoController')->middleware('auth');

Route::resource('/employer/job', 'JobController')->middleware('auth');

Route::get('/', 'JobController@index')->name('job')->middleware('auth');
Route::post('/jobs/{job}', 'JobController@apply')->name('job.apply')->middleware('auth');

Route::get('/jobs/{job}', 'JobController@job')->name('job')->middleware('auth');

Route::resource('/seeker/resume', 'DocumentController')->middleware('auth');
Route::resource('/seeker/profile', 'SProfileController')->middleware('auth');

Route::get('/download/{document}', 'DocumentController@download')->name('download')->middleware('auth');

Route::post('/keywords', 'SProfileController@keywords')->name('keywords')->middleware('auth');


