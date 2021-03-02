<?php

declare(strict_types=1);

namespace  App\Repositories\Eloquent;

use App\Models\EstatesCategorie;

class EstatesCategoriesRepository extends BaseRepository
{
    public function __construct(EstatesCategorie $model)
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

    public function getCategoriesByGroupId($group_id)
    {
        return $this->model->where('estates_groups_id', '=', $group_id)->get();
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
