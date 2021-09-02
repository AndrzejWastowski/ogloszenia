<?php

declare(strict_types=1);

namespace  App\Repositories\Eloquent;

use App\Models\ServicesContent;
use App\Models\ServicesPhoto;
use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\Collection;


class ServicesRepository extends BaseRepository
{
    public function __construct(ServicesContent $model)
    {
        $this->model = $model;
    }

    public function get(int $id): ?ServicesContent
    {
        return $this->model->find($id);
    }

    public function save(ServicesContent $model):bool
    {
        return $model->save();
    }


    public function update(ServicesContent $model):bool
    {
        return   $model->update();
    }

    public function getAll($columns = array('*'))
    {
        return $this->model
            ->with('User')
            ->with('Photos')
            ->with('ServicesCategories')
            ->get($columns);
    }

    public function getAllServices()
    {
        $result = $this->model
         ->with('user')
         ->with('photos')
         ->with('ServicesCategories')
         ->where('services_contents.status', 'active')
         ->paginate(10);
      //  dd($result);
        return $result;
    }

    
    public function getServicesByCategoriesId($categoriesId = 0,$number_row = 10) 
    {
        
        $results = $this->model
        ->select(
            'services_contents.*'           
        )
        ->with('User')
        ->with('Photos')
        ->with('ServicesCategories')          
        ->where('services_contents.Services_categories_id', $categoriesId)        
        ->where('services_contents.status', 'active')
        ->orderBy('services_contents.promoted', 'desc')   
        ->paginate($number_row);

       // dd($results);
        return $results;
    }



    public function getServicesByCategoriesLink($categories, $number_row = 10)
    {
        $results = $this->model
        ->select(
            'services_contents.*'           
        )
        ->with('User')
        ->with('Photos')
        ->with('ServicesCategories')             
        ->where('Services_categories.link', '=', $categories)
        ->where('services_contents.status', 'active')
        ->orderBy('services_contents.promoted', 'desc')   
        ->paginate($number_row);


        //dd($results);
        return $results;
    }

    public function getNonUnfinishedServices($userId = 0) 
    {
        $result = $this->model
        ->limit(1)
        ->with('user')        
        ->where('services_contents.status', 'unfinished')
        ->where('services_contents.users_id', $userId)
        ->orderBy('services_contents.id', 'desc')
        ->first();

        return $result;
    }



    public function getServicesByTypes($type, $number_row)
    {
        $results = $this->model
        ->select(
            'services_contents.*'           
        )
        ->with('User')
        ->with('Photos')
        ->with('ServicesCategories')             
        ->where('services_contents.Services_type', '=', $type)
        ->where('services_contents.status', 'active')
        ->orderBy('services_contents.promoted', 'desc')   
        ->paginate($number_row);
        //dd($results);
        return $results;
    }

    public function getCountServicesByCategories($categories)
    {
        $results = $this->model
        ->join('Services_categories', 'services_contents.Services_categories_id', '=', 'Services_categories.id')
        ->where('Services_categories.link', '=', $categories)
        ->count();

        return $results;
    }

    public function getServicesById($id)
    {
        
        $results = $this->model
        ->select(
            'services_contents.*'           
        )
            ->with('User')
            ->with('TopPhotos')
            ->with('ServicesCategories')                       
            ->where('services_contents.id', '=', $id)
            ->get();

        return $results;
    }

    public function getLastServices($how_mutch)
    {
        return $this->model->limit($how_mutch)->orderBy('date_end', 'desc')
        ->get();
    }

    public function GetNonActiveServices($users_id)
    {
        $results = $this->model
        ->select(
            'services_contents.id as id',
            'services_contents.id as services_contents_id',
            'services_contents.name as services_contents_name',
            'services_contents.lead as services_contents_lead',
            'services_contents.description as services_contents_description',
            'services_contents.area as services_contents_area',
            'services_contents.unit as services_contents_unit',
            'services_contents.market as services_contents_market',
            'services_contents.market as services_contents_market',
            'services_contents.price as services_contents_price',
            'services_contents.active as services_contents_active',
            'services_contents.inscription as services_contents_inscription',
            'services_contents.highlighted as services_contents_highlighted',
            'services_contents.promoted as services_contents_promoted',
            'services_contents.date_add as services_contents_date_add',
            'services_contents.date_start as services_contents_date_start',
            'services_contents.date_end as services_contents_date_end',
            'services_contents.adresses_id as services_contents_adresses_id',
            'services_contents.portal_id as services_contents_portal_id',
            'Services_categories.id as Services_categories_id',
            'Services_categories.name as Services_categories_name',
            'Services_categories.link as Services_categories_link'
           
            )
            ->join('Services_categories', 'services_contents.Services_categories_id', '=', 'Services_categories.id')
            ->join('users', 'users.id', '=', 'services_contents.users_id')
        ->where('services_contents.active', '=', 0)
        ->where('services_contents.users_id', '=', $users_id)
        ->first();
        //dd($results);
        return $results;
    }



    public function getPromoted($limit, $skip) 
    {
        $request = $this->model
        
            ->with('User')
            ->with('TopPhotos')
            ->with('ServicesCategories')          
            ->where('services_contents.promoted', 1)         
            ->where('services_contents.status', 'active')
            ->orderBy('services_contents.promoted', 'desc')
        ->limit($limit)
        ->offset($skip)
        ->get();
      
        return $request;
    }

}

