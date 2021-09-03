<?php

declare(strict_types=1);

namespace  App\Repositories\Eloquent;

use App\Models\CarsModel;
use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class CarsModelsRepository extends BaseRepository
{
    public function __construct(CarsModel $model)
    {
        $this->model = $model;
    }

    public function getAllModels()
    {
        return $this->model->orderBy('model','asc')->get();
    }

    public function getModelsByBrandsId($id)
    {
        $data = $this->model->where('cars_brands_id', $id)->orderBy('model', 'asc')->get();
       // dd($data);
        return $data;
    }

   
    public function getModelsByLink($link) {

       
        return $this->model->where('link', '=', $link)->first();
     
        }
    
    public function getLastAds($how_mutch)
    {
        return $this->model->limit($how_mutch)->orderBy('date_end', 'desc')->get();
    }
}
