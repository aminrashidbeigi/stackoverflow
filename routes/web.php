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

Route::resource('questions', 'QuestionController');
Route::resource('solutions', 'SolutionController');
Auth::routes();

Route::get('/', 'QuestionController@index')->name('home');

Route::put('/solutions/{id}/votes/increase', 'SolutionController@increaseVote')->name('vote.increase');
Route::put('/solutions/{id}/votes/decrease', 'SolutionController@decreaseVote')->name('vote.decrease');

Route::get('notifications', 'NotificationController@getIndex')->name('notifications');