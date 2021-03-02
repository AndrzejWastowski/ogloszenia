<?php

declare(strict_types=1);

namespace  App\Repositories\Eloquent;

use App\Models\EstatesPhoto;

class EstatesPhotosRepository extends BaseRepository
{
    public function __construct(EstatesPhoto $model)
    {
        $this->model = $model;
    }

    public function getAllPhotosByEstate($id)
    {
        return $this->model->where('estates_contents_id', $id)->orderBy('sort', 'asc')->get();
    }

    public function getFirstPhotosByEstate($id)
    {
        return $this->model->where('estates_contents_id', $id)->orderBy('sort', 'asc')->skip(0)->take(1)->first();
    }

    public function getLastPhotoByEstate($id)
    {
        return $this->model->where('estates_contents_id', $id)->orderBy('sort', 'desc')->skip(0)->take(1)->first();
    }
}
