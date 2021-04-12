<?php

declare(strict_types=1);

namespace  App\Repositories\Eloquent;

use App\Models\SmallAdsSubCategorie;
use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class SmallAdsSubCategoriesRepository extends BaseRepository
{
    public function __construct(SmallAdsSubCategorie $model)
    {
        $this->model = $model;
    }

    public function getAllSubCategories()
    {
        return $this->model->orderBy('name','asc')->get();
    }

    public function getSubcategoriesByCategoriesId($id)
    {
        $data = $this->model->where('small_ads_categories_id', $id)->orderBy('name', 'asc')->get();
       // dd($data);
        return $data;
    }

   
    public function getSubCategoriesByLink($link) {

       
        return $this->model->where('link', '=', $link)->first();
     
        }
    
    public function getLastAds($how_mutch)
    {
        return $this->model->limit($how_mutch)->orderBy('date_end', 'desc')->get();
    }
}
