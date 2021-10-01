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



    public function  ListsAllModels()
    {
        $brands = $this->CarsBrandsRepository->getAllBrandsWithModels();
        $models = $this->CarsModelsRepository->getAllModels();        
        $content = $this->CarsRepository->getLastCars(10);  

        //dd($content);
    
    

        return View('cars.ListsAllModels', [
            'pageName' => 'Lista Ogłoszeń Drobnych',
            'brands' => $brands,
            'models' => $models,   
            'contents' => $content,         
            'storage' => $this->storage
            ]);
    }

    

    public function ListsAllCars() 
    {
        $content = $this->CarsRepository->getAllCars(10);
        $brands = $this->CarsBrandsRepository->getAllBrandsWithModels();    
        $models = $this->CarsModelsRepository->getAllModels();    

       

        return View('cars.ListAllCars', [

            'pageName' => 'Lista ogłoszeń motoryzacyjnych - wszystkie',                
            'brands' => $brands,
            'model' => $models,
            'models' => $models,
            'contents' => $content,
            'storage' => $this->storage,  

            ]);       
        
    }



    public function ListsByBrands($brand_link='',$content_page=0) 
    {

        $brand = $this->CarsBrandsRepository->getBrandsByLink($brand_link);
        $brands = $this->CarsBrandsRepository->getAllBrandsWithModelsByBrandsId($brand->id);

        if (!is_null($brand)) {

            $models = $this->CarsModelsRepository->getmodelsByBrandsId($brand->id);
            $content = $this->CarsRepository->getAllCarsByBrandsId($brand->id,10);    

           

            return View('cars.ListByBrands', [

                'pageName' => 'Lista ogłoszeń motoryzacyjnych',                
                'brands' => $brands,
                'model' => $models,
                'models' => $models,
                'contents' => $content,
                'storage' => $this->storage,  
    
                ]);       
        }
        else
        {
            $this->ListsAllBrands();
        }
      //  dd($total_page);
    }



    //public function ListsBymodels($Brands,$models)  
    public function ListsByModels($model_link,$subcategory_link )  
    {
        $model = $this->CarsModelsRepository->getModelsByLink($model_link);
        
        $content = $this->CarsRepository->getAllCarsByModelsId($model->id,20);
  
        dd($content);

        return View('cars.ListBymodels', [
            'pageName' => 'Lista Ogłoszeń',
            'contents' => $content,
            'storage' => $this->storage
            ]);
    }


    public function ListsByModelsId($brand_link,$model_link,$id)  
    {
        
        
        $brands = $this->CarsBrandsRepository->getAllBrandsWithModelsByBrandsName($brand_link);       
        $content = null;
        $models = $this->CarsModelsRepository->getModelsById((int)$id);
        $model = null;
        foreach ($models as $model) {
            
            $content = $this->CarsRepository->getAllCarsByModelsId($model->id,20);
        }

      

        if ($content!=null) {
           // dd($content);

            return View('cars.ListByModels', [
            'pageName' => 'Lista ogłoszeń motoryzacyjnych - samocody osobowe ',
            'pom_model' => $model,
            'brands'=> $brands,
            'contents' => $content,
            'storage' => $this->storage
            ]);
        }
        else 
        {
            return redirect()->route("CarsStart");
        }

    }
    


}