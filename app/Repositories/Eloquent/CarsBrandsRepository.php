<?php

declare(strict_types=1);

namespace  App\Repositories\Eloquent;

use App\Models\CarsBrand;
use App\Repositories\Eloquent\BaseRepository;

class CarsBrandsRepository extends BaseRepository
{
    public function __construct(CarsBrand $model)
    {
        $this->model = $model;
    }

    public function getAllBrands()
    {
        $data = $this->model->orderBy('name', 'asc')->get();
        return $data;
    }


    public function getAllBrandsWithModels()
    {
        $data = $this->model
        ->with('CarsModels')
        ->orderBy('name', 'asc')->get();
        return $data;
    }


    public function getBrandWithModelsByBrandId($id = 0)
    {   
        $data = $this->model
        ->with('CarsModels')
        ->where('cars_brands.id', '=', $id)->get();

        return $data;
    }

    public function getPopularBrands()
    {
        return $this->model->where('popular', 1)->orderBy('name', 'asc')->get();
    }

    public function getBrandsById($id)
    {
        $data = $this->model->where('id', '=', $id)->get();
        //dd($data);   
        return $data;
    }

 

}
