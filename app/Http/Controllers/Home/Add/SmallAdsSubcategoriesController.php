<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home\Add;

use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\SmallAdsSubCategoriesRepository;

class SmallAdsSubCategoriesController extends Controller
{
    
    private $smallAdsSubCategories;

    public function __construct(SmallAdsSubCategoriesRepository $smallAdsSubCategories) {
        $this->smallAdsSubCategories = $smallAdsSubCategories;
        
    }
    
    /*
    public function index(AdRepository $AdsCategories) {
        $ads = $AdsCategories->getAllAds();

        $pageName = 'Ogłoszenia lista - wywoływana z cxontrollera AdsContents';
        $ogloszenia = 'ogłoszenia - cos tu trzeba wpisac';
        $kategoria = 'Kategoria - nazwa';

        return View('ogloszenia.Lista', [
            'pageName' => $pageName,
            'ogloszenia' => $ads,
            'kategoria' => $kategoria,
            ]);
    }
    */

    public function getJson($categoriesId)  {
        return Response()->json($this->smallAdsSubCategories->getSubcategoriesByCategoriesId($categoriesId));
    }
}