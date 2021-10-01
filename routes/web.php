<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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
/*
Route::get('/', function () {
    return view('index');
});
*/

Route::get('/', [App\Http\Controllers\StartController::class, 'start'])->name('start');
Route::get('/start', [App\Http\Controllers\StartController::class, 'start'])->name('startx');

Route::get('login/{provider}', 'App\Http\Controllers\Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'App\Http\Controllers\Auth\LoginController@handleProviderCallback');

Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});


Route::get('/auth/callback', function () {
    $user = Socialite::driver('google')->user();

    // OAuth 2.0 providers...
    $token = $user->token;
    $refreshToken = $user->refreshToken;
    $expiresIn = $user->expiresIn;

    // All providers...
    $user->getId();
    $user->getNickname();
    $user->getName();
    $user->getEmail();
    $user->getAvatar();
});


Route::group(['prefix' => 'drobne'], function () {
    Route::get('/', [App\Http\Controllers\SmallAds\ListsController::class,'ListsAllCategories'])->name('SmallAdsStart'); 
    Route::get('/{categories}', [App\Http\Controllers\SmallAds\ListsController::class, 'ListsByCategories'])->name('SmallAdsByCategories');
    Route::get('/{categories}/{subcategories}', [App\Http\Controllers\SmallAds\ListsController::class, 'ListsBySubCategories'])->name('SmallAdsBySubCategories');   
    Route::get('/{categories}/{subcategories}/{id}', [App\Http\Controllers\SmallAds\ContentController::class,'content'])->where(['id' => '[0-9]+'])->name('SmallAdsContentsById');


});


Route::group(['prefix' => 'nieruchomosci'], function () {
    Route::get('/', [App\Http\Controllers\Estates\ListsController::class,'ListsAllCategories'])->name('EstatesStart'); 
    Route::get('/{categories}', [App\Http\Controllers\Estates\ListsController::class, 'ListsByCategories'])->name('EstatesListByCategories');    
    
    //Route::get('/{categories} ', ['categories'=>'wszystkie','uses'=>'App\Http\Controllers\SmallAds\ListsController@ListsByCategories'])->name('SmallAdsListsByCategories');
    //Route::get('/{categories}/{subcategories}', ['categories'=>'wszystkie','subcategories'=>'wszystkie','uses'=>'App\Http\Controllers\SmallAds\ListsController@ListsBySubCategories'])->name('SmallAdsListsBySubCategories');
    Route::get('/{categories}/{id}', [App\Http\Controllers\Estates\ContentController::class,'content'])->where(['id' => '[0-9]+'])->name('EstatesContentsById');


});


Route::group(['prefix' => 'uslugi'], function () {
    Route::get('/', [App\Http\Controllers\Services\ListsController::class,'ListsAllCategories'])->name('ServicesStart'); 
    Route::get('/{categories}', [App\Http\Controllers\Services\ListsController::class, 'ListsByCategories'])->name('ServicesListByCategories');    
    
    //Route::get('/{categories} ', ['categories'=>'wszystkie','uses'=>'App\Http\Controllers\SmallAds\ListsController@ListsByCategories'])->name('SmallAdsListsByCategories');
    //Route::get('/{categories}/{subcategories}', ['categories'=>'wszystkie','subcategories'=>'wszystkie','uses'=>'App\Http\Controllers\SmallAds\ListsController@ListsBySubCategories'])->name('SmallAdsListsBySubCategories');
    Route::get('/{categories}/{id}', [App\Http\Controllers\Services\ContentController::class,'content'])->where(['id' => '[0-9]+'])->name('ServicesContentsById');


});




Route::group(['prefix' => 'motoryzacja'], function () {
    Route::get('/', [App\Http\Controllers\Automotive\StartController::class,'index'])->name('MotoryzationStart'); 
    Route::get('samochody_osobowe/', [App\Http\Controllers\Cars\ListsController::class,'ListsAllCars'])->name('CarsStart'); 
    Route::get('samochody_osobowe/{brand}', [App\Http\Controllers\Cars\ListsController::class, 'ListsByBrands'])->name('CarsListByBrands');    
    Route::get('samochody_osobowe/{brand}/{model}', [App\Http\Controllers\Cars\ListsController::class, 'ListsByModels'])->name('CarsListByModels');    
    Route::get('samochody_osobowe/{brand}/{model}/{id}', [App\Http\Controllers\Cars\ListsController::class, 'ListsByModelsId'])->where(['id' => '[0-9]+'])->name('CarsListByModelsId');    
    
    //Route::get('/{categories} ', ['categories'=>'wszystkie','uses'=>'App\Http\Controllers\SmallAds\ListsController@ListsByCategories'])->name('SmallAdsListsByCategories');
    //Route::get('/{categories}/{subcategories}', ['categories'=>'wszystkie','subcategories'=>'wszystkie','uses'=>'App\Http\Controllers\SmallAds\ListsController@ListsBySubCategories'])->name('SmallAdsListsBySubCategories');
    Route::get('/{categories}/{id}', [App\Http\Controllers\Cars\ContentController::class,'content'])->where(['id' => '[0-9]+'])->name('CarsContentsById');


});




Auth::routes();
#group route to task of adding services
Route::group(['prefix' => 'home'], function () {
    
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/tablica', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    
    Route::get('/select', [App\Http\Controllers\HomeController::class, 'select'])->name('select');

    Route::get('/automotive_type', [App\Http\Controllers\Home\Add\AutomotiveTypeController::class, 'index'])->name('automotive_type');
    

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
    
    //dodawanie nieruchomosci
    
    Route::get('/add/estates', [App\Http\Controllers\Home\Add\EstatesController::class, 'content'])->name('estates_content');
    Route::post('/add/estates', [App\Http\Controllers\Home\Add\EstatesController::class, 'content_post'])->name('estates_content_post');
    Route::get('/add/estates/photo', [App\Http\Controllers\Home\Add\EstatesController::class, 'photo'])->name('estates_photo');
    Route::post('/add/estates/photo', [App\Http\Controllers\Home\Add\EstatesController::class, 'photo_post'])->name('estates_photo_post');
    Route::get('/add/estates/promotion', [App\Http\Controllers\Home\Add\EstatesController::class, 'promotion'])->name('estates_promotion');
    Route::post('/add/estates/promotion', [App\Http\Controllers\Home\Add\EstatesController::class, 'promotion_post'])->name('estates_promotion_post');
    Route::get('/add/estates/summary', [App\Http\Controllers\Home\Add\EstatesController::class, 'summary'])->name('estates_summary');
    Route::post('/add/estates/summary', [App\Http\Controllers\Home\Add\EstatesController::class, 'summary_post'])->name('estates_summary_post');
    Route::get('/add/estates/success', [App\Http\Controllers\Home\Add\EstatesController::class, 'summary_post'])->name('estates_success');
    Route::post('/add/estates/success', [App\Http\Controllers\Home\Add\EstatesController::class, 'summary_post'])->name('estates_success_post');
    Route::post('/add/estates/payments', [App\Http\Controllers\Home\Add\EstatesController::class, 'payments'])->name('estates_payments');
    Route::post('/add/estates/payments', [App\Http\Controllers\Home\Add\EstatesController::class, 'payments'])->name('estates_payments_post');

   
    //dodawanie usługi
    
    Route::get('/add/services', [App\Http\Controllers\Home\Add\ServicesController::class, 'content'])->name('services_content');
    Route::post('/add/services', [App\Http\Controllers\Home\Add\ServicesController::class, 'content_post'])->name('services_content_post');
    Route::get('/add/services/photo', [App\Http\Controllers\Home\Add\ServicesController::class, 'photo'])->name('services_photo');
    Route::post('/add/services/photo', [App\Http\Controllers\Home\Add\ServicesController::class, 'photo_post'])->name('services_photo_post');
    Route::get('/add/services/promotion', [App\Http\Controllers\Home\Add\ServicesController::class, 'promotion'])->name('services_promotion');
    Route::post('/add/services/promotion', [App\Http\Controllers\Home\Add\ServicesController::class, 'promotion_post'])->name('services_promotion_post');
    Route::get('/add/services/summary', [App\Http\Controllers\Home\Add\ServicesController::class, 'summary'])->name('services_summary');
    Route::post('/add/services/summary', [App\Http\Controllers\Home\Add\ServicesController::class, 'summary_post'])->name('services_summary_post');
    Route::get('/add/services/success', [App\Http\Controllers\Home\Add\ServicesController::class, 'summary_post'])->name('services_success');
    Route::post('/add/services/success', [App\Http\Controllers\Home\Add\ServicesController::class, 'summary_post'])->name('services_success_post');
    Route::post('/add/services/payments', [App\Http\Controllers\Home\Add\ServicesController::class, 'payments'])->name('services_payments');
    Route::post('/add/services/payments', [App\Http\Controllers\Home\Add\ServicesController::class, 'payments'])->name('services_payments_post');


    //dodawanie motoryzacja
    
    Route::get('/add/cars', [App\Http\Controllers\Home\Add\CarsController::class, 'content'])->name('cars_content');
    Route::post('/add/cars', [App\Http\Controllers\Home\Add\CarsController::class, 'content_post'])->name('cars_content_post');
    Route::get('/add/cars/photo', [App\Http\Controllers\Home\Add\CarsController::class, 'photo'])->name('cars_photo');
    Route::post('/add/cars/photo', [App\Http\Controllers\Home\Add\CarsController::class, 'photo_post'])->name('cars_photo_post');
    Route::get('/add/cars/promotion', [App\Http\Controllers\Home\Add\CarsController::class, 'promotion'])->name('cars_promotion');
    Route::post('/add/cars/promotion', [App\Http\Controllers\Home\Add\CarsController::class, 'promotion_post'])->name('cars_promotion_post');
    Route::get('/add/cars/summary', [App\Http\Controllers\Home\Add\CarsController::class, 'summary'])->name('cars_summary');
    Route::post('/add/cars/summary', [App\Http\Controllers\Home\Add\CarsController::class, 'summary_post'])->name('cars_summary_post');
    Route::get('/add/cars/success', [App\Http\Controllers\Home\Add\CarsController::class, 'summary_post'])->name('cars_success');
    Route::post('/add/cars/success', [App\Http\Controllers\Home\Add\CarsController::class, 'summary_post'])->name('cars_success_post');
    Route::post('/add/cars/payments', [App\Http\Controllers\Home\Add\CarsController::class, 'payments'])->name('cars_payments');
    Route::post('/add/cars/payments', [App\Http\Controllers\Home\Add\CarsController::class, 'payments'])->name('cars_payments_post');
   
       

    Route::get('/add/jobs', [App\Http\Controllers\HomeController::class, 'index'])->name('home/add/jobs');
    


    Route::get('/lists/small', [App\Http\Controllers\Home\Lists\SmallAdsController::class, 'lists'])->name('home/lists/small');
    Route::get('/lists/cars', [App\Http\Controllers\HomeController::class, 'index'])->name('home/lists/cars');
    Route::get('/lists/estates', [App\Http\Controllers\HomeController::class, 'index'])->name('home/lists/estates');
});





    #dodatki do dodawania ogłoszen - ajax
    Route::group(['prefix' => 'internal-api'], function () {
    
        //Route::get('/add/subcat/{categoriesId}', ['categoriesId'=>'0','uses'=>'Ads\SubCategoriesController@getJson']);        
    Route::get('/add/subcat/{categoriesId}', ['categoriesId'=>'0', App\Http\Controllers\Home\Add\SmallAdsSubcategoriesController::class, 'getJson']);
    Route::get('/cars/{categoriesId}', ['categoriesId'=>'0', App\Http\Controllers\InternalApi\CarsModelsController::class, 'getJson']);
        
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
