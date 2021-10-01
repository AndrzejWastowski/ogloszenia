<?php

declare(strict_types=1);

namespace App\Http\Controllers\Cars;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\CarsRepository;
use App\Repositories\Eloquent\CarsBrandsRepository;
use App\Repositories\Eloquent\CarsModelsRepository;
use App\Repositories\Eloquent\CarsPhotosRepository;
use Illuminate\Support\Facades\Storage;


class ContentController extends Controller
{
    private $CarsRepository;
    private $CarsBrandsRepository;
    private $CarsModelsRepository;

    private $storage;

    public function __construct(
        CarsRepository $CarsRepository,
        CarsBrandsRepository $CarsBrandsRepository,
        CarsModelsRepository $CarsModelsRepository,
        CarsPhotosRepository $CarsPhotosRepository,
        Storage $storage


       // Session $session,
    
    ) {
        $this->CarsRepository = $CarsRepository;
        $this->CarsBrandsRepository = $CarsBrandsRepository;
        $this->CarsModelsRepository = $CarsModelsRepository;
        $this->CarsPhotosRepository = $CarsPhotosRepository;
        $this->storage = $storage::disk('local');
    }

    public function content(Request $request, $categories, $subcategories, $id)
    {
        //dd($id);
        $categories = $this->CarsBrandsRepository->getAllBrands();
        $subcategories = $this->CarsModelsRepository->getAll();        
        $content = $this->CarsRepository->getCarsById($id);
     
       
        return View('cars.Content', [
            'pageName' => 'Ogłoszenie',
            'categories' => $categories,
            'subcategories' => $subcategories,
            'contents' => $content,
            'storage' => $this->storage
            ]);
    }
}