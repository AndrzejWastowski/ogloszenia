<?php

declare(strict_types=1);

namespace  App\Repositories\Eloquent;

use App\Models\EstatesGroup;

class EstatesGroupsRepository extends BaseRepository
{
    public function __construct(EstatesGroup $model)
    {
        $this->model = $model;
    }

    public function getAllGroups()
    {
        return $this->model->orderBy('name', 'asc')->get();
    }

    public function getGroupsById($id)
    {
        return $this->model->where('id', '=', $id)->get();
    }
}
