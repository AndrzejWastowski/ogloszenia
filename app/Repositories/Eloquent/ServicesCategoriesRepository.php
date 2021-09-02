<?php

declare(strict_types=1);

namespace  App\Repositories\Eloquent;

use App\Models\ServicesCategorie;

class ServicesCategoriesRepository extends BaseRepository
{
    public function __construct(ServicesCategorie $model)
    {
        $this->model = $model;
    }

    public function getAllCategories()
    {
        return $this->model->orderBy('name', 'asc')->get();
    }

    public function getPopularCategories()
    {
        return $this->model->where('popular', 1)->orderBy('name', 'asc')->get();
    }

    public function getCategoriesById($id)
    {
        return $this->model->where('id', '=', $id)->first();
    }
    
    public function getCategoriesByGroupsName($name)
    {
        return $this->model->where('name', '=', $name)->get();
    }

    public function getCategoriesByLink($link)
    {
        return $this->model->where('link', '=', $link)->get();
    }
}
