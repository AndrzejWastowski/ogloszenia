<?php

declare(strict_types=1);

namespace  App\Repositories\Eloquent;

use App\Models\EstatesContent;
use App\Models\EstatesPhoto;
use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\Collection;


class EstatesRepository extends BaseRepository
{
    public function __construct(EstatesContent $model)
    {
        $this->model = $model;
    }

    public function get(int $id): ?EstatesContent
    {
        return $this->model->find($id);
    }

    public function save(EstatesContent $model):bool
    {
        return $model->save();
    }


    public function update(EstatesContent $model):bool
    {
        return   $model->update();
    }

    public function getAll($columns = array('*'))
    {
        return $this->model
            ->with('User')
            ->with('Photos')
            ->with('EstatesCategories')
            ->get($columns);
    }

    public function getAllEstates()
    {
        $result = $this->model
         ->with('user')
         ->with('photos')
         ->with('EstatesCategories')
         ->where('estates_contents.status', 'active')
         ->paginate(10);
      //  dd($result);
        return $result;
    }

    
    public function getEstatesByCategoriesId($categoriesId = 0,$number_row = 10) 
    {
        
        $results = $this->model
        ->select(
            'estates_contents.*'           
        )
        ->with('User')
        ->with('Photos')
        ->with('EstatesCategories')
        ->with('EstatesGroups')       
        ->where('estates_contents.estates_categories_id', $categoriesId)        
        ->where('estates_contents.status', 'active')
        ->orderBy('estates_contents.promoted', 'desc')   
        ->paginate($number_row);

       // dd($results);
        return $results;
    }



    public function getEstatesByCategoriesLink($categories, $number_row = 10)
    {
        $results = $this->model
        ->select(
            'estates_contents.*'           
        )
        ->with('User')
        ->with('Photos')
        ->with('EstatesCategories')
        ->with('EstatesGroups')       
        ->where('estates_categories.link', '=', $categories)
        ->where('estates_contents.status', 'active')
        ->orderBy('estates_contents.promoted', 'desc')   
        ->paginate($number_row);


        //dd($results);
        return $results;
    }

    public function getNonUnfinishedEstates($userId = 0) 
    {
        $result = $this->model
        ->limit(1)
        ->with('user')        
        ->where('estates_contents.status', 'unfinished')
        ->where('estates_contents.users_id', $userId)
        ->orderBy('estates_contents.id', 'desc')
        ->first();

        return $result;
    }



    public function getEstatesByGroups($groups, $limit = 10, $page = 0)
    {
        $results = $this->model
        ->select(
            'estates_contents.id as id',
            'estates_contents.id as estates_contents_id',
            'estates_contents.name as estates_contents_name',
            'estates_contents.lead as estates_contents_lead',
            'estates_contents.description as estates_contents_description',
            'estates_contents.area as estates_contents_area',
            'estates_contents.unit as estates_contents_unit',
            'estates_contents.market as estates_contents_market',
            'estates_contents.market as estates_contents_market',
            'estates_contents.price as estates_contents_price',
            'estates_contents.active as estates_contents_active',
            'estates_contents.recomended as estates_contents_recomended',
            'estates_contents.highlighted as estates_contents_highlighted',
            'estates_contents.promoted as estates_contents_promoted',
            'estates_contents.date_add as estates_contents_date_add',
            'estates_contents.date_start as estates_contents_date_start',
            'estates_contents.date_end as estates_contents_date_end',
            'estates_contents.adresses_id as estates_contents_adresses_id',
            'estates_contents.portal_id as estates_contents_portal_id',
            'estates_categories.id as estates_categories_id',
            'estates_categories.name as estates_categories_name',
            'estates_categories.link as estates_categories_link',
            'estates_groups.id as estates_group_id',
            'estates_groups.name as estates_group_name'
        )
        ->join('estates_categories', 'estates_contents.estates_categories_id', '=', 'estates_categories.id')
        ->join('estates_groups', 'estates_contents.estates_groups_id', '=', 'estates_groups.id')
        ->join('users', 'users.id', '=', 'estates_contents.users_id')
        ->join('estates_photos', 'estates_contents.id', '=', 'estates_photos.estates_contents_id')
        ->where('estates_categories.link', '=', $groups)
        ->where('estates_photos.sort', 1)
        ->orderBy('estates_contents.promoted', 'desc')
        ->paginate($limit);
        //dd($results);
        return $results;
    }

    public function getCountEstatesByCategories($categories)
    {
        $results = $this->model
        ->join('estates_categories', 'estates_contents.estates_categories_id', '=', 'estates_categories.id')
        ->where('estates_categories.link', '=', $categories)
        ->count();

        return $results;
    }

    public function getEstatesById($id)
    {
        
        $results = $this->model
        ->select(
            'estates_contents.*'           
        )
            ->with('User')
            ->with('TopPhotos')
            ->with('EstatesCategories')  
            ->with('EstatesGroups')            
            ->where('estates_contents.id', '=', $id)
            ->get();

        return $results;
    }

    public function getLastEstates($how_mutch)
    {
        return $this->model->limit($how_mutch)->orderBy('date_end', 'desc')
        ->get();
    }

    public function GetNonActiveEstates($users_id)
    {
        $results = $this->model
        ->select(
            'estates_contents.id as id',
            'estates_contents.id as estates_contents_id',
            'estates_contents.name as estates_contents_name',
            'estates_contents.lead as estates_contents_lead',
            'estates_contents.description as estates_contents_description',
            'estates_contents.area as estates_contents_area',
            'estates_contents.unit as estates_contents_unit',
            'estates_contents.market as estates_contents_market',
            'estates_contents.market as estates_contents_market',
            'estates_contents.price as estates_contents_price',
            'estates_contents.active as estates_contents_active',
            'estates_contents.recomended as estates_contents_recomended',
            'estates_contents.highlighted as estates_contents_highlighted',
            'estates_contents.promoted as estates_contents_promoted',
            'estates_contents.date_add as estates_contents_date_add',
            'estates_contents.date_start as estates_contents_date_start',
            'estates_contents.date_end as estates_contents_date_end',
            'estates_contents.adresses_id as estates_contents_adresses_id',
            'estates_contents.portal_id as estates_contents_portal_id',
            'estates_categories.id as estates_categories_id',
            'estates_categories.name as estates_categories_name',
            'estates_categories.link as estates_categories_link',
            'estates_groups.id as estates_group_id',
            'estates_groups.name as estates_group_name'
            )
            ->join('estates_categories', 'estates_contents.estates_categories_id', '=', 'estates_categories.id')
            ->join('estates_groups', 'estates_contents.estates_groups_id', '=', 'estates_groups.id')
            ->join('users', 'users.id', '=', 'estates_contents.users_id')
        ->where('estates_contents.active', '=', 0)
        ->where('estates_contents.users_id', '=', $users_id)
        ->first();
        //dd($results);
        return $results;
    }



    public function getPromoted($limit, $skip) 
    {
        $request = $this->model
        
            ->with('User')
            ->with('TopPhotos')
            ->with('EstatesCategories')          
            ->where('estates_contents.promoted', 1)         
            ->where('estates_contents.status', 'active')
            ->orderBy('estates_contents.promoted', 'desc')
        ->limit($limit)
        ->offset($skip)
        ->get();
      
        return $request;
    }

}

