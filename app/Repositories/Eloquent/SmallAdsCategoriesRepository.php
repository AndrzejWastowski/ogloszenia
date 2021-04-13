<?php

declare(strict_types=1);

namespace  App\Repositories\Eloquent;

use App\Models\SmallAdsCategorie;

class SmallAdsCategoriesRepository extends BaseRepository
{
    public function __construct(SmallAdsCategorie $model)
    {
        $this->model = $model;
    }

    public function getAllCategories()
    {
        $data = $this->model->orderBy('name', 'asc')->get();
        return $data;
    }


    public function getAllCategoriesWithSubCategories()
    {
        $data = $this->model
        ->with('SmallAdsSubCategories')
        ->orderBy('name', 'asc')->get();
        return $data;
    }

    public function getAllCategoriesWithSubcategoriesByCategoriesId($id = 0)
    {
        $data = $this->model
        ->with('SmallAdsSubCategories')
        ->where('small_ads_categories.id', '=', $id)->get();
        
        return $data;
    }




    public function getPopularCategories()
    {
        return $this->model->where('popular', 1)->orderBy('name', 'asc')->get();
    }

    public function getCategoriesById($id)
    {
        return $this->model->where('id', '=', $id)->get();
    }

    public function getCategoriesByLink($link)
    {
        return $this->model->where('link', '=', $link)->first();
    }

}
