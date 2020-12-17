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


Route::get('/start', [App\Http\Controllers\StartController::class, 'index'])->name('start');
Auth::routes();
Route::get('/home/tablica', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/select', [App\Http\Controllers\HomeController::class, 'select'])->name('select');

Route::get('/home/add/small_ads', [App\Http\Controllers\Home\Add\SmallAdsController::class, 'content'])->name('small_ads_content');
Route::post('/home/add/small_ads', [App\Http\Controllers\Home\Add\SmallAdsController::class, 'content_post'])->name('small_ads_content_post');

Route::get('/home/add/automotive', [App\Http\Controllers\HomeController::class, 'index'])->name('home/add/automotive');
Route::get('/home/add/estates', [App\Http\Controllers\HomeController::class, 'index'])->name('home/add/estates');
Route::get('/home/add/jobs', [App\Http\Controllers\HomeController::class, 'index'])->name('home/add/jobs');



Route::get('/home/list/small', [App\Http\Controllers\HomeController::class, 'index'])->name('home/list/small');
Route::get('/home/list/automotive', [App\Http\Controllers\HomeController::class, 'index'])->name('home/list/automotive');
Route::get('/home/list/estates', [App\Http\Controllers\HomeController::class, 'index'])->name('home/list/estates');




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
