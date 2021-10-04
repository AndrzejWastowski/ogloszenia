<?php

declare(strict_types=1);

namespace  App\Repositories\Eloquent;

use App\Models\CarsModel;
use App\Repositories\Eloquent\BaseRepository;

class CarsModelsRepository extends BaseRepository
{
    public function __construct(CarsModel $model)
    {
        $this->model = $model;
    }

    public function getAllModels()
    {
        return $this->model->orderBy('name','asc')->get();
    }

    public function getModelsByBrandsId($id)
    {
        
        $data = $this->model->where('cars_brands_id', $id)->orderBy('cars_brands.name', 'asc')->get();
       
        return $data;
    }

   
    public function getModelsById($id = 0) {

       
        $data =  $this->model->where('cars_models.id', $id)->get();
     
        return $data;
         
    }
    
    public function getLastAds($how_mutch)
    {
        return $this->model->limit($how_mutch)->orderBy('date_end', 'desc')->get();
    }
}
