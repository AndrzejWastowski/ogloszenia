<?php

declare(strict_types=1);

namespace  App\Repositories\Eloquent;

use App\Models\SmallAdsSubCategorie;
use App\Repositories\Eloquent\BaseRepository;

class SmallAdsSubCategoriesRepository extends BaseRepository
{
    public function __construct(SmallAdsSubCategorie $model)
    {
        $this->model = $model;
    }

    public function getAllSubCategories()
    {
        return $this->model->orderBy('id', 'name', 'link', 'asc')->get();
    }

    public function getSubcategoriesByCategoriesId($id)
    {
        return $this->model->where('small_ads_categories_id', $id)->orderBy('name', 'asc')->get();
    }

    /*
        public function getSubcategoriesByCategoriesLink($link) {

            return $this->model->where('ads_categories_id',$link)->orderBy('name','asc')->get();
        }
      */
    public function getLastAds($how_mutch)
    {
        return $this->model->limit($how_mutch)->orderBy('date_end', 'desc')->get();
    }
}
