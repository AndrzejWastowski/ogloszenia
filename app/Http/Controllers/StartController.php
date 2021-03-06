<?php

namespace App\Http\Controllers;


use App\Repositories\Eloquent\SmallAdsRepository;
use App\Repositories\Eloquent\EstatesRepository;


use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

final class StartController extends Controller
{

    private $smallAdsRepository;
    private $smallAdsCategoriesRepository;
    private $smallAdsSubCategoriesRepository;    
    private $estatesRepository;
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
        Storage $storage )
    {
        $this->smallAdsRepository = $smallAdsRepository;
        $this->estatesRepository = $estatesRepository;
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
        $smal_ads_promo= $this->smallAdsRepository->getPromoted(4, 0);
        $smal_ads_promoted = $this->smallAdsRepository->getPromoted(12, 0);

        $smallAdsLastChanse = $this->smallAdsRepository->getLastChanse(4);
        $smallAdsNewOffer = $this->smallAdsRepository->getNewOffer(4);
        $smallAdsTopView = $this->smallAdsRepository->getTopView(4);
        $estates = $this->estatesRepository->getPromoted(12,0);
        $estates_promo = $this->estatesRepository->getPromoted(4,0);

        return View('start', [
            'storage' => $storage,            
            'smal_ads_promo' => $smal_ads_promo,
            'estates_promo' => $estates_promo,
            'smal_ads_promoted' => $smal_ads_promoted,
            'estates' => $estates,    
            'adsLastChanse' => $smallAdsLastChanse,
            'adsNewOffer' => $smallAdsNewOffer,
            'adsTopView' => $smallAdsTopView,]);

    }
}

