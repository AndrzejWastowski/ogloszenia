<?php

declare(strict_types=1);

namespace  App\Repositories\Eloquent;

use App\Models\Price;

class PriceRepository extends BaseRepository
{
    public function __construct(Price $model)
    {
        $this->model = $model;
    }

    public function getAllPrices()
    {
        $data = $this->model->orderBy('name', 'asc')->get();
        return $data;
    }


    public function getAllFromSection($section)
    {
        $data = $this->model->orderBy('name', 'asc')
        ->where('section', $section)  
        ->get();
        return $data;
    }


    
    public function getAllFromSectionAndName($section,$name)
    {
        $data = $this->model
        ->where('section', $section)  
        ->where('name', $name)  
        ->first();
        return $data;
    }

}
