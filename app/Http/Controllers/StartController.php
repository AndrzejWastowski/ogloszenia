<?php

namespace App\Http\Controllers;


use App\Repositories\Eloquent\SmallAdsRepository;
use App\Repositories\Eloquent\EstatesRepository;
use App\Repositories\Eloquent\CarsRepository;
use Hamcrest\Core\HasToString;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

final class StartController extends Controller
{

    private $smallAdsRepository;
    private $smallAdsCategoriesRepository;
    private $smallAdsSubCategoriesRepository;    
    private $estatesRepository;
    private $carsRepository;
    private $priceRepository;
    private $storage;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        SmallAdsRepository $smallAdsRepository, 
        EstatesRepository $estatesRepository,
        CarsRepository $carsRepository,
        Storage $storage )
    {
        $this->smallAdsRepository = $smallAdsRepository;
        $this->estatesRepository = $estatesRepository;
        $this->carsRepository = $carsRepository;
        $this->storage = $storage;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function start()
    {
        $storage = $this->storage::disk('local');
        $smal_ads_promo= $this->smallAdsRepository->getPromoted(12, 0);        

    

        $smallAdsLastChanse = $this->smallAdsRepository->getLastChanse(4);
     
        
        $smallAdsNewOffer = $this->smallAdsRepository->getNewOffer(4);
        $smallAdsTopView = $this->smallAdsRepository->getTopView(4);

        $estates = $this->estatesRepository->getPromoted(12,0);
        $estates_promo = $this->estatesRepository->getPromoted(4,0);
        
        $cars_promo = $this->carsRepository->getPromoted(4,0);
//dd($cars_promo);


$props[0] = array (
    'id' =>'1', 
    'alt'=>'jeden',
    'captionTitle'=>'title 1a',
    'caption'=>'pierwszy obrazek',
    'src'=>'/storage/addons/product1.jpg');

$props[1] = array (
    'id' =>'2', 
    'alt'=>'dwa', 
    'captionTitle'=>'title 2a', 
    'caption'=>'drugi obrazek',
    'src' =>'/storage/addons/product2.jpg');

$props[2] = array (
    'id' =>'3',
    'alt'=>'trzy', 
    'captionTitle'=>'title 3a', 
    'caption'=>'trzeci obrazek',
    'src'=>'/storage/addons/product3.jpg');

//$promo_items = array ('id' =>'1', 'alt'=>'jeden', 'captionTitle'=>'title 1a', 'caption'=>'pierwszy obrazek','src'=>'/storage/addons/product1.jpg');
//$props = json_encode($props);
//dd ($props);
//<div id="SliderPromoParm" items="[{&quot;id&quot;:&quot;1&quot;,&quot;alt&quot;:&quot;jeden&quot;,&quot;captionTitle&quot;:&quot;title" 1a&quot;,&quot;caption&quot;:&quot;pierwszy="" obrazek&quot;,&quot;src&quot;:&quot;\="" storage\="" addons\="" product1.jpg&quot;},{&quot;id&quot;:&quot;2&quot;,&quot;alt&quot;:&quot;dwa&quot;,&quot;captiontitle&quot;:&quot;title="" 2a&quot;,&quot;caption&quot;:&quot;drugi="" product2.jpg&quot;},{&quot;id&quot;:&quot;3&quot;,&quot;alt&quot;:&quot;trzy&quot;,&quot;captiontitle&quot;:&quot;title="" 3a&quot;,&quot;caption&quot;:&quot;trzykoty="" product3.jpg&quot;}]=""> </div>
 $json_items = '[{"id":"1","alt":"jeden","captionTitle":"title 1a","caption":"pierwszy obrazek","src":"\/storage\/addons\/product1.jpg"},{"id":"2","alt":"dwa","captionTitle":"title 2a","caption":"drugi obrazek","src":"\/storage\/addons\/product2.jpg"},{"id":"3","alt":"trzy","captionTitle":"title 3a","caption":"trzykoty obrazek","src":"\/storage\/addons\/product3.jpg"}]';
//dd ($json_items);

        return View('start', [
            'items' =>  $json_items,
            'storage' => $storage,   
            'smal_ads_promo' => $smal_ads_promo,
            'estates_promo' => $estates_promo,
            'cars_promo' => $cars_promo,            
            'estates' => $estates,    
            'adsLastChanse' => $smallAdsLastChanse,
            'adsNewOffer' => $smallAdsNewOffer,
            'adsTopView' => $smallAdsTopView,]);

    }
}


