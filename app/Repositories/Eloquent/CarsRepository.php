<?php

declare(strict_types=1);

namespace  App\Repositories\Eloquent;

use App\Models\CarsContent;

use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\Collection;



class CarsRepository extends BaseRepository
{

    /**
     * @var CarsContent
    */


    public function __construct(CarsContent $model)
    {
        $this->model = $model;
    }


    public function get(int $id): ?CarsContent
    {
        return $this->model->find($id);
    }

    public function save(CarsContent $model):bool
    {
        return $model->save();
    }


    public function update(CarsContent $model):bool
    {
        return   $model->update();
    }



    public function getAllCars($number_row)
    {

        $results = $this->model
        
        ->with('top_photos')
        ->with('CarsBrands')
        ->with('CarsModels')                       
        ->where('cars_contents.status', 'active')
        ->orderBy('cars_contents.promoted', 'desc')
        ->paginate($number_row);

        return $results;
    }


    public function getCarsById($id) :?Collection
    {
        $results = $this->model
        ->select(
            'cars_contents.*'           
        )
        ->with('user')
        ->with('photos')
        ->with('CarsBrands')
        ->with('CarsModels')               
        ->where('cars_contents.status', 'active')
        ->orderBy('cars_contents.promoted', 'desc') 
        ->get();
                
       //dd($results);
        return $results;
    }


    public function getPromoted($limit, $skip) :Collection
    {

        $results = $this->model
        
        ->with('top_photos')
        ->with('CarsBrand')
        ->with('CarsModel')        
        ->where('cars_contents.promoted', 1)        
        ->where('cars_contents.status', 'active')
        ->orderBy('cars_contents.promoted', 'desc')
        ->limit($limit)
        ->offset($skip)
        ->get();
//dd($results);
        return $results;
    }
    public function getLastCars($number_row = 10)
    {
        $results = $this->model
                ->with('user')
        ->with('topPhotos')
        ->with('SmallAdsCategories')
        ->with('SmallAdsSubCategories')  
        ->where('small_ads_contents.status', 'active')
        ->orderBy('small_ads_contents.promoted', 'desc')   
    
        ->paginate($number_row);


       // dd($results);
        return $results;

    }

    public function getAllCarsByBrandsId($brandsId = 0,$number_row = 10) 
    {
        
        $results = $this->model
        ->select(
            'cars_contents.*'           
        )
        ->with('user')
        ->with('photos')
        ->with('CarsBrands')
        ->with('CarsModels')       
        ->where('cars_contents.cars_brands_id', $brandsId)        
        ->where('cars_contents.status', 'active')
        ->orderBy('cars_contents.promoted', 'desc')   
        ->paginate($number_row);

       // dd($results);
        return $results;
    }


    

    public function getAllCarsByModelsId($modelId = 0,$number_row = 10) 
    {
        
        $results = $this->model
        ->select(
            'cars_contents.*'           
        )
        ->with('user')
        ->with('photos')
        ->with('CarsBrands')
        ->with('CarsModels')       
        ->where('cars_contents.cars_models_id', $modelId)        
        ->where('cars_contents.status', 'active')
        ->orderBy('cars_contents.promoted', 'desc')   
        ->paginate($number_row);

       // dd($results);
        return $results;
    }



    public function getNonUnfinishedCars($userId = 0) :?CarsContent
    {
        $result = $this->model
        ->limit(1)
        ->with('user')        
        ->where('cars_contents.status', 'unfinished')
        ->where('cars_contents.users_id', $userId)
        ->orderBy('cars_contents.id', 'desc')
        ->first();

        return $result;
    }

}