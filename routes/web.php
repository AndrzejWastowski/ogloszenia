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

Route::get('/', function () {
    return view('index');
});


Route::get('/start', [App\Http\Controllers\StartController::class, 'index'])->name('start');
Auth::routes();

#group route to task of adding services
Route::group(['prefix' => 'home'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/tablica', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    Route::get('/select', [App\Http\Controllers\HomeController::class, 'select'])->name('select');

    Route::get('/add/small_ads', [App\Http\Controllers\Home\Add\SmallAdsController::class, 'content'])->name('small_ads_content');
    Route::post('/add/small_ads', [App\Http\Controllers\Home\Add\SmallAdsController::class, 'content_post'])->name('small_ads_content_post');
    Route::get('/add/small_ads/photo', [App\Http\Controllers\Home\Add\SmallAdsController::class, 'photo'])->name('small_ads_photo');
    Route::post('/add/small_ads/photo', [App\Http\Controllers\Home\Add\SmallAdsController::class, 'photo_post'])->name('small_ads_photo_post');
    Route::get('/add/small_ads/promotion', [App\Http\Controllers\Home\Add\SmallAdsController::class, 'promotion'])->name('small_ads_promotion');
    Route::post('/add/small_ads/promotion', [App\Http\Controllers\Home\Add\SmallAdsController::class, 'promotion_post'])->name('small_ads_promotion_post');
    Route::get('/add/small_ads/summary', [App\Http\Controllers\Home\Add\SmallAdsController::class, 'summary'])->name('small_ads_summary');
    Route::post('/add/small_ads/summary', [App\Http\Controllers\Home\Add\SmallAdsController::class, 'summary_post'])->name('small_ads_summary_post');
    Route::get('/add/small_ads/success', [App\Http\Controllers\Home\Add\SmallAdsController::class, 'summary_post'])->name('small_ads_success');
    Route::post('/add/small_ads/success', [App\Http\Controllers\Home\Add\SmallAdsController::class, 'summary_post'])->name('small_ads_success_post');
    Route::post('/add/small_ads/payments', [App\Http\Controllers\Home\Add\SmallAdsController::class, 'payments'])->name('small_ads_payments');
    Route::post('/add/small_ads/payments', [App\Http\Controllers\Home\Add\SmallAdsController::class, 'payments'])->name('small_ads_payments_post');

    

    Route::get('/add/automotive', [App\Http\Controllers\HomeController::class, 'index'])->name('home/add/automotive');
    Route::get('/add/estates', [App\Http\Controllers\HomeController::class, 'index'])->name('home/add/estates');
    Route::get('/add/jobs', [App\Http\Controllers\HomeController::class, 'index'])->name('home/add/jobs');
    


    Route::get('/lists/small', [App\Http\Controllers\Home\Lists\SmallAdsController::class, 'lists'])->name('home/lists/small');
    Route::get('/lists/automotive', [App\Http\Controllers\HomeController::class, 'index'])->name('home/lists/automotive');
    Route::get('/lists/estates', [App\Http\Controllers\HomeController::class, 'index'])->name('home/lists/estates');
});





    #dodatki do dodawania ogłoszen - ajax
    Route::group(['prefix' => 'internal-api'], function () {
    
        //Route::get('/add/subcat/{categoriesId}', ['categoriesId'=>'0','uses'=>'Ads\SubCategoriesController@getJson']);        
        Route::get('/add/subcat/{categoriesId}', ['categoriesId'=>'0', App\Http\Controllers\Home\Add\SmallAdsSubcategoriesController::class, 'getJson']);
        
    }); 

Route::get('/pomoc', [App\Http\Controllers\InfoController::class, 'help'])->name('help');




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
