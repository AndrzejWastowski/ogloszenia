<?php

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

Route::get('/', function () {
    return view('index');
});

Auth::routes();
Route::get('/start', [App\Http\Controllers\HomeController::class, 'index'])->name('start');
Route::get('/home/tablica', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['namespace' => 'App\Http\Controllers'], function(){
    Route::get('/register1', 'RegisterController@createStep1')->name('signup');
    Route::post('/register1', 'RegisterController@PostcreateStep1');
    Route::get('/register2', 'RegisterController@createStep2')->name('step2');
    Route::post('/register2', 'RegisterController@PostcreateStep2');
    Route::get('/register3', 'RegisterController@createStep3');
    Route::post('/register3', 'RegisterController@PostcreateStep3');
    Route::post('/remove-image', 'RegisterController@removeImage');
    Route::post('/store', 'RegisterController@store');
    Route::get('/data', 'RegisterController@index');
});
