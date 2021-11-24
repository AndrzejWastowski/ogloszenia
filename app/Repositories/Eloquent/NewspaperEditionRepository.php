<?php

declare(strict_types=1);

namespace  App\Repositories\Eloquent;

use App\Models\NewspaperEdition;
use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class NewspaperEditionRepository extends BaseRepository
{
    public function __construct(NewspaperEdition $model)
    {
        $this->model = $model;
    }

    public function getAllEdition()
    {
        $data = $this->model->orderBy('name', 'asc')->get();
      //  dd($data);
        return $data;
    }

    public function getNewspaperEditionById($id) : NewspaperEdition
    {
        $data = 
        $this->model->where('id', '=', $id)
        ->with('Newspaper')
        ->first();
      //  dd($data);
        return $data;
    }

    public function getAvaibleNewspaperEdition()
    {
        $data = $this->model->with('AvaibleEditions')              
    
        ->orderBy('name', 'asc') 
        ->get();
        return $data;
    }

    

}
