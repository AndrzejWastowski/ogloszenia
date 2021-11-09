<?php

declare(strict_types=1);

namespace  App\Repositories\Eloquent;

use App\Models\Newspaper;
use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class NewspaperRepository extends BaseRepository
{
    public function __construct(Newspaper $model)
    {
        $this->model = $model;
    }

    public function getAllNewspaper()
    {
        $data = $this->model->orderBy('name', 'asc')->get();
      //  dd($data);
        return $data;
    }

    public function getAllNewspaperEdition()
    {
        $data = $this->model->with('Editions')
        ->orderBy('name', 'asc')                
        ->get();
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
