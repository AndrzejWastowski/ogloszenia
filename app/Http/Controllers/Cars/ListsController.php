<?php

declare(strict_types=1);

namespace App\Http\Controllers\Cars;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



use App\Repositories\Eloquent\CarsRepository;
use App\Repositories\Eloquent\CarsBrandsRepository;
use App\Repositories\Eloquent\CarsModelsRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;

class ListsController extends Controller
{
    private $CarsRepository;
    private $CarsBrandsRepository;
    private $CarsModelsRepository;

    private $storage;

    public function __construct(
        CarsRepository $CarsRepository,
        CarsBrandsRepository $CarsBrandsRepository,
        CarsModelsRepository $CarsModelsRepository,
        Storage $storage

 
    ) {
        $this->CarsRepository = $CarsRepository;
        $this->CarsBrandsRepository = $CarsBrandsRepository;
        $this->CarsModelsRepository = $CarsModelsRepository;     
        $this->storage = $storage::disk('local');
    }



    

    public function ListsAllCars() 
    {
        $content = $this->CarsRepository->getAllCars(10);
        $brands = $this->CarsBrandsRepository->getAllBrandsWithModels();          

        return View('cars.ListAllCars', [

            'pageName' => 'Lista ogłoszeń motoryzacyjnych - wszystkie',   
            'brands' => $brands,            
            'contents' => $content,
            'storage' => $this->storage,  

            ]);       
        
    }



    public function ListsByBrandsId(Request $request) 
    {


        $bid = (int)$request->bid;
        //$brand = $this->CarsBrandsRepository->getBrandsById($bid);        
        $brands = $this->CarsBrandsRepository->getBrandWithModelsByBrandId($bid);
        foreach ($brands as $brand) {

            $contents = $this->CarsRepository->getAllCarsByBrandsId($brand->id,10);    
    
            return View('cars.ListByBrands', [
    
               'pageName' => 'Lista ogłoszeń motoryzacyjnych',                
                'brand' => $brand,
                'brands' => $brands,                    
                'contents' => $contents,
                'storage' => $this->storage,  
            ]);       

        }
        
    }



    public function ListsByModelsId(Request $request)  
    {
        $res = $request->brand . ' ' . $request->bid  .' ' . $request->model . ' ' . $request->mid;
        //dd($res);
        //$bid = $request->input('bid');
        //$id = $request->input('id');        
        
        $brands = $this->CarsBrandsRepository->getBrandWithModelsByBrandId($request->bid);               
        $models = $this->CarsModelsRepository->getModelsById($request->mid);
        $content = $this->CarsRepository->getAllCarsByModelsId($request->mid);
        
        $brand = null;
        $model = null;
        foreach ($brands as $brand) { }
        foreach ($models as $model) { }
            
            if ($content!=null) {
                //  dd($content);

                return View('cars.ListByModels', [
                'pageName' => 'Ogłoszenia - samochody na sprzedaż -  ',
                'brand'=> $brand,
                'model'=>$model,
                'contents' => $content,
                'storage' => $this->storage
                ]);
            } else {
                return redirect()->route("CarsStart");
            }
        }

   
    


}