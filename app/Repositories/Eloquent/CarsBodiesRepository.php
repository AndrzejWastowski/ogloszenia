<?php

declare(strict_types=1);

namespace  App\Repositories\Eloquent;

use App\Models\CarsBody;
use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class CarsBodiesRepository extends BaseRepository
{
    public function __construct(CarsBody $model)
    {
        $this->model = $model;
    }

    public function getAllBodies()
    {
        $data = $this->model->orderBy('name', 'asc')->get();
      //  dd($data);
        return $data;
    }


    public function getBodiesById($id)
    {
        $data = $this->model->where('id', '=', $id)->get();
      
        return $data;
    }


}
