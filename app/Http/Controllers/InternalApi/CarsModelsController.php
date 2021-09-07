<?php

declare(strict_types=1);

namespace App\Http\Controllers\InternalApi;

use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\CarsModelsRepository;

class CarsModelsController extends Controller
{
    
    private $smallAdsSubCategories;

    public function __construct(CarsModelsRepository $carsModels) {
        $this->carsModels = $carsModels;
        
    }
    
    
    public function index() {
        
        return View('home');
    }

    public function getJson($categoriesId)  {
        return Response()->json($this->carsModels->getModelsByBrandsId($categoriesId));
    }
}