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
           

       

        return View('cars.ListAllCars', [

            'pageName' => 'Lista ogłoszeń motoryzacyjnych - wszystkie',                
            'brands' => $brands,            
            'contents' => $content,
            'storage' => $this->storage,  

            ]);       
        
    }



    public function ListsByBrandsId(Request $request) 
    {


        $bid = $request->input('bid');
        $brand = $this->CarsBrandsRepository->getBrandsById($bid);        
        $brands = $this->CarsBrandsRepository->getAllBrandsWithModelsByBrandsId($brand->id);
      
        if (!is_null($brand->id)) {

            $models = $this->CarsModelsRepository->getModelsByBrandsId($brand->id);
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



    public function ListsByModelsId($brand,$bid,$model,$mid)  
    {
        $res = $brand . ' ' . $bid  .' ' . $model . ' ' . $mid;
        //dd($res);
        //$bid = $request->input('bid');
        //$id = $request->input('id');
        $bid = 1;
        $brands = $this->CarsBrandsRepository->getAllBrandsWithModelsByBrandsId($bid);       
        $content = null;
        $models = $this->CarsModelsRepository->getModelsById($mid);
        $model = null;
        foreach ($models as $model) {
            
            $content = $this->CarsRepository->getAllCarsByModelsId($model->id);
        }

      

        if ($content!=null) {
         //  dd($content);

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