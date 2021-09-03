<?php

declare(strict_types=1);

namespace  App\Repositories\Eloquent;

use App\Models\CarsPhoto;

class CarsPhotosRepository extends BaseRepository
{
    public function __construct(CarsPhoto $model)
    {
        $this->model = $model;
    }

    public function getAllPhotosByCars($id)
    {
        return $this->model->where('cars_contents_id', $id)->orderBy('sort', 'asc')->get();
    }

    public function getFirstPhotosByEstate($id)
    {
        return $this->model->where('cars_contents_id', $id)->orderBy('sort', 'asc')->skip(0)->take(1)->first();
    }

    public function getLastPhotoByCars($id)
    {
        return $this->model->where('cars_contents_id', $id)->orderBy('sort', 'desc')->skip(0)->take(1)->first();
    }
}
