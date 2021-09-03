<?php

declare(strict_types=1);

namespace  App\Repositories\Eloquent;

use App\Models\CarsContent;

use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\Collection;



class CarsRepository extends BaseRepository
{

    /**
     * @var CarsContent
    */


    public function __construct(CarsContent $model)
    {
        $this->model = $model;
    }


    public function get(int $id): ?CarsContent
    {
        return $this->model->find($id);
    }

    public function save(CarsContent $model):bool
    {
        return $model->save();
    }


    public function update(CarsContent $model):bool
    {
        return   $model->update();
    }


    public function getCarsById($id) :?Collection
    {
        $results = $this->model
        ->select(
            'small_ads_contents.*'           
        )
        ->with('User')
        ->with('photos')
        ->with('CarsBrand')
        ->with('CarsModel')       
        ->where('cars_contents.id', $id)
        ->get();
                
       //dd($results);
        return $results;
    }


    public function getPromoted($limit, $skip) :Collection
    {

        $results = $this->model
        
        ->with('top_photos')
        ->with('CarsBrand')
        ->with('CarsModel')        
        ->where('cars_contents.promoted', 1)        
        ->where('cars_contents.status', 'active')
        ->orderBy('cars_contents.promoted', 'desc')
        ->limit($limit)
        ->offset($skip)
        ->get();
//dd($results);
        return $results;
    }

    public function getNonUnfinishedCars($userId = 0) :?CarsContent
    {
        $result = $this->model
        ->limit(1)
        ->with('user')        
        ->where('cars_contents.status', 'unfinished')
        ->where('cars_contents.users_id', $userId)
        ->orderBy('cars_contents.id', 'desc')
        ->first();

        return $result;
    }

}