<?php

declare(strict_types=1);

namespace App\Http\Controllers\InternalApi;

use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\SmallAdsSubCategoriesRepository;

class SubCategoriesController extends Controller
{
    
    private $smallAdsSubCategories;

    public function __construct(SmallAdsSubCategoriesRepository $smallAdsSubCategories) {
        $this->smallAdsSubCategories = $smallAdsSubCategories;
        
    }
    
    
    public function index() {
        
        return View('home');
    }

    public function getJson($categoriesId)  {
        return Response()->json($this->smallAdsCategories->getSubcategoriesByCategoriesId($categoriesId));
    }
}