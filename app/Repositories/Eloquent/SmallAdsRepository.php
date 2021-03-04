<?php

declare(strict_types=1);

namespace  App\Repositories\Eloquent;

use App\Models\SmallAdsContent;
use App\Models\SmallAdsPhoto;

use App\Models\SmallAdsCategorie;
use App\Models\SmallAdsSubCategorie;
use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\Collection;



class SmallAdsRepository extends BaseRepository
{

    /**
     * @var SmallAdsContent
    */


    public function __construct(SmallAdsContent $model)
    {
        $this->model = $model;
    }

    public function get(int $id): ?SmallAdsContent
    {
        return $this->model->find($id);
    }

    public function save(SmallAdsContent $ad):bool
    {
        return $ad->save();
    }


    public function update(SmallAdsContent $ad):bool
    {
        return   $ad->update();
    }


    public function getSingleSmallAds(array $params): ?SmallAdsContent
    {
        return $this->model->where($params)->first();
    }

/*  public function removeAdImage(int $adId): bool
    {
        $ad = $this->get($adId);
        return $ad->getAllImages()->delete();
    }
*/
    public function getAll($columns = array('*')) :Collection
    {
        return $this->model
            ->with('user')
            ->with('photos')
            ->with('SmallAdsCategories')
            ->get($columns);
    }

    public function getPromoted($limit, $skip) :Collection
    {
        $results = $this->model
        ->select(
            'small_ads_contents.id as id',
            'small_ads_contents.id as small_ads_contents_id',
            'small_ads_contents.name as small_ads_contents_name',
            'small_ads_contents.lead as small_ads_contents_lead',
            'small_ads_contents.price as small_ads_contents_price',
            'small_ads_contents.date_start as small_ads_contents_date_start',
            'small_ads_contents.date_end as small_ads_contents_date_end',
            'small_ads_contents.recomended as small_ads_contents_recomended',
            'small_ads_contents.highlighted as small_ads_contents_highlighted',
            'small_ads_contents.promoted as small_ads_contents_promoted',
            'small_ads_contents.invoice as small_ads_contents_invoice',
            'small_ads_contents.date_end as small_ads_contents_date_end',
            'small_ads_contents.condition as small_ads_contents_condition',
            'small_ads_contents.small_ads_sub_categories_id as small_ads_contents_sub_categories_id',
            'users.id as users_id',
            'users.name as users_name',
            'small_ads_categories.id as small_ads_categories_id',
            'small_ads_categories.name as small_ads_categories_name',
            'small_ads_categories.link as small_ads_categories_link',
            'small_ads_sub_categories.id as small_ads_sub_categories_id',
            'small_ads_sub_categories.name as small_ads_sub_categories_name',
            'small_ads_sub_categories.link as small_ads_sub_categories_link',
            'small_ads_photos.name as small_ads_photos_name'
        )
        ->join('small_ads_categories', 'small_ads_contents.small_ads_categories_id', '=', 'small_ads_categories.id')
        ->join('small_ads_sub_categories', 'small_ads_contents.small_ads_sub_categories_id', '=', 'small_ads_sub_categories.id')
        ->join('users', 'users.id', '=', 'small_ads_contents.users_id')
        ->join('small_ads_photos', 'small_ads_contents.id', '=', 'small_ads_photos.small_ads_contents_id')        
        ->where('small_ads_contents.promoted', 1)
        ->where('small_ads_photos.sort', 1)
        ->where('small_ads_contents.status', 'active')
        ->orderBy('small_ads_contents.promoted', 'desc')
        ->limit($limit)
        ->offset($skip)
        ->get();
       
        //dd($results);        

        return $results;
    }

    public function getNonUnfinishedSmallAds($userId = 0) :?SmallAdsContent
    {
        $result = $this->model
        ->limit(1)
        ->with('user')        
        ->where('small_ads_contents.status', 'unfinished')
        ->where('small_ads_contents.users_id', $userId)
        ->orderBy('small_ads_contents.id', 'desc')
        ->first();

        return $result;
    }


    public function getAllSmallAds($columns = array('*')) :?Collection
    {
        $result = $this->model
         ->with('user')
         ->with('photos')
         ->with('small_ads_categories')
         ->where('small_ads_contents.status', 'enabled')
         ->get();

        return $result;
    }

    public function getAllSmallAdsByCategories($categories, $limit = 10, $page = 0) :?Collection
    {
        $results = $this->model
        ->select(
            'small_ads_contents.id as id',
            'small_ads_contents.id as small_ads_contents_id',
            'small_ads_contents.name as small_ads_contents_name',
            'small_ads_contents.lead as small_ads_contents_lead',
            'small_ads_contents.price as small_ads_contents_price',
            'small_ads_contents.date_start as small_ads_contents_date_start',
            'small_ads_contents.date_end as small_ads_contents_date_end',
            'small_ads_contents.recomended as small_ads_contents_recomended',
            'small_ads_contents.highlighted as small_ads_contents_highlighted',
            'small_ads_contents.promoted as small_ads_contents_promoted',
            'small_ads_contents.invoice as small_ads_contents_invoice',
            'small_ads_contents.date_end as small_ads_contents_date_end',
            'small_ads_contents.condition as small_ads_contents_condition',
            'small_ads_contents.small_ads_sub_categories_id as small_ads_contents_sub_categories_id',
            'users.id as users_id',
            'users.name as users_name',
            'small_ads_categories.id as small_ads_categories_id',
            'small_ads_categories.name as small_ads_categories_name',
            'small_ads_categories.link as small_ads_categories_link',
            'small_ads_sub_categories.id as small_ads_sub_categories_id',
            'small_ads_sub_categories.name as small_ads_sub_categories_name',
            'small_ads_sub_categories.link as small_ads_sub_categories_link',
            'small_ads_photos.id as small_ads_photos_id'
        )
        ->join('small_ads_categories', 'small_ads_contents.small_ads_categories_id', '=', 'small_ads_categories.id')
        ->join('small_ads_sub_categories', 'small_ads_contents.small_ads_sub_categories_id', '=', 'small_ads_sub_categories.id')
        ->join('users', 'users.id', '=', 'small_ads_contents.users_id')
        ->join('small_ads_photos', 'small_ads_contents.id', '=', 'small_ads_photos.small_ads_contents_id')
        ->where('small_ads_categories.link', '=', $categories)
        ->where('small_ads_photos.sort', 1)
        ->orderBy('small_ads_contents.promoted', 'desc')
        ->limit($limit)
        ->get();
        //dd($results);
        return $results;
    }

    public function getCountSmallAdsByCategories($categories) :?int
    {
        $results = $this->model
        ->join('small_ads_categories', 'small_ads_contents.small_ads_categories_id', '=', 'small_ads_categories.id')
        ->where('small_ads_categories.link', '=', $categories)
        ->count();

        return $results;
    }

    public function getAllSmallAdsBySubCategories($subCategories, $limit = 10, $page = 0) :?Collection
    {
        $results = $this->model
        ->select(
            'small_ads_contents.id as id',
            'small_ads_contents.id as small_ads_contents_id',
            'small_ads_contents.name as small_ads_contents_name',
            'small_ads_contents.lead as small_ads_contents_lead',
            'small_ads_contents.price as small_ads_contents_price',
            'small_ads_contents.date_start as small_ads_contents_date_start',
            'small_ads_contents.date_end as small_ads_contents_date_end',
            'small_ads_contents.recomended as small_ads_contents_recomended',
            'small_ads_contents.highlighted as small_ads_contents_highlighted',
            'small_ads_contents.promoted as small_ads_contents_promoted',
            'small_ads_contents.invoice as small_ads_contents_invoice',
            'small_ads_contents.date_end as small_ads_contents_date_end',
            'small_ads_contents.condition as small_ads_contents_condition',
            'small_ads_contents.small_ads_sub_categories_id as small_ads_contents_sub_categories_id',
            'users.id as users_id',
            'users.name as users_name',
            'small_ads_categories.id as small_ads_categories_id',
            'small_ads_categories.name as small_ads_categories_name',
            'small_ads_categories.link as small_ads_categories_link',
            'small_ads_sub_categories.id as small_ads_sub_categories_id',
            'small_ads_sub_categories.name as small_ads_sub_categories_name',
            'small_ads_sub_categories.link as small_ads_sub_categories_link',
            'small_ads_photos.id as small_ads_photos_id'
        )
        ->join('small_ads_categories', 'small_ads_contents.small_ads_categories_id', '=', 'small_ads_categories.id')
        ->join('small_ads_sub_categories', 'small_ads_contents.small_ads_sub_categories_id', '=', 'small_ads_sub_categories.id')
        ->join('users', 'users.id', '=', 'small_ads_contents.users_id')
        ->join('small_ads_photos', 'small_ads_contents.id', '=', 'small_ads_photos.small_ads_contents_id')
        ->where('small_ads_sub_categories.link', '=', $subCategories)
        ->where('small_ads_photos.sort', '=', 1)

        ->get();
        //   dd($sub_categories,$results);
        // dd($results);
        return $results;
    }

    public function getAllSmallAdsBySubCategoriesPromoted($subCategories, $limit = 10, $page = 0) :?Collection
    {
        $results = $this->model
        ->select(
            'small_ads_contents.id as id',
            'small_ads_contents.id as small_ads_contents_id',
            'small_ads_contents.name as small_ads_contents_name',
            'small_ads_contents.lead as small_ads_contents_lead',
            'small_ads_contents.price as small_ads_contents_price',
            'small_ads_contents.date_start as small_ads_contents_date_start',
            'small_ads_contents.date_end as small_ads_contents_date_end',
            'small_ads_contents.recomended as small_ads_contents_recomended',
            'small_ads_contents.highlighted as small_ads_contents_highlighted',
            'small_ads_contents.promoted as small_ads_contents_promoted',
            'small_ads_contents.invoice as small_ads_contents_invoice',
            'small_ads_contents.date_end as small_ads_contents_date_end',
            'small_ads_contents.condition as small_ads_contents_condition',
            'small_ads_contents.small_ads_sub_categories_id as small_ads_contents_sub_categories_id',
            'users.id as users_id',
            'users.name as users_name',
            'small_ads_categories.id as small_ads_categories_id',
            'small_ads_categories.name as small_ads_categories_name',
            'small_ads_categories.link as small_ads_categories_link',
            'small_ads_sub_categories.id as small_ads_sub_categories_id',
            'small_ads_sub_categories.name as small_ads_sub_categories_name',
            'small_ads_sub_categories.link as small_ads_sub_categories_link',
            'small_ads_photos.id as small_ads_photos_id'
        )
        ->join('small_ads_categories', 'small_ads_contents.small_ads_categories_id', '=', 'small_ads_categories.id')
        ->join('small_ads_sub_categories', 'small_ads_contents.small_ads_sub_categories_id', '=', 'small_ads_sub_categories.id')
        ->join('users', 'users.id', '=', 'small_ads_contents.users_id')
        ->join('small_ads_photos', 'small_ads_contents.id', '=', 'small_ads_photos.small_ads_contents_id')
        ->where('small_ads_sub_categories.link', '=', $subCategories)
        ->where('small_ads_contents.promoted = 1')
        ->where('small_ads_photos.sort', '=', 1)

        ->get();
        // dd($sub_categories);
        // dd($results);
        return $results;
    }

    public function getCountSmallAdsBySubCategories($subCategories) :int
    {
        $results = $this->model
        ->join('small_ads_sub_categories', 'small_ads_contents.small_ads_sub_categories_id', '=', 'small_ads_sub_categories.id')
        ->where('small_ads_sub_categories.link', '=', $subCategories)
        ->count();
        
        return $results;
    }

    public function getSmallAdsById($id) :?SmallAdsContent
    {
        $results = $this->model
        ->select(
            'small_ads_contents.id as id',
            'small_ads_contents.id as small_ads_contents_id',
            'small_ads_contents.name as small_ads_contents_name',
            'small_ads_contents.lead as small_ads_contents_lead',
            'small_ads_contents.description as small_ads_contents_description',
            'small_ads_contents.price as small_ads_contents_price',
            'small_ads_contents.date_start as small_ads_contents_date_start',
            'small_ads_contents.date_end as small_ads_contents_date_end',
            'small_ads_contents.recomended as small_ads_contents_recomended',
            'small_ads_contents.highlighted as small_ads_contents_highlighted',
            'small_ads_contents.promoted as small_ads_contents_promoted',
            'small_ads_contents.invoice as small_ads_contents_invoice',            
            'small_ads_contents.condition as small_ads_contents_condition',
            'small_ads_contents.small_ads_sub_categories_id as small_ads_contents_sub_categories_id',
            'users.id as users_id',
            'users.name as users_name',
            'small_ads_categories.id as small_ads_categories_id',
            'small_ads_categories.name as small_ads_categories_name',
            'small_ads_categories.link as small_ads_categories_link',
            'small_ads_sub_categories.id as small_ads_sub_categories_id',
            'small_ads_sub_categories.name as small_ads_sub_categories_name',
            'small_ads_sub_categories.link as small_ads_sub_categories_link'
            )
            ->join('small_ads_categories', 'small_ads_contents.small_ads_categories_id', '=', 'small_ads_categories.id')
            ->join('small_ads_sub_categories', 'small_ads_contents.small_ads_sub_categories_id', '=', 'small_ads_sub_categories.id')
            ->join('users', 'users.id', '=', 'small_ads_contents.users_id')

        ->where('small_ads_contents.id', '=', $id)
        ->first();
        
       //dd($results);
        return $results;
    }

    //get latest small_ads
    public function getNewOffer($howMutch)
    {
        $results =  $this->model
        ->select(
            'small_ads_contents.id as id',
            'small_ads_contents.id as small_ads_contents_id',
            'small_ads_contents.name as small_ads_contents_name',
            'small_ads_contents.lead as small_ads_contents_lead',
            'small_ads_contents.price as small_ads_contents_price',
            'small_ads_contents.date_start as small_ads_contents_date_start',
            'small_ads_contents.date_end as small_ads_contents_date_end',
            'small_ads_contents.recomended as small_ads_contents_recomended',
            'small_ads_contents.highlighted as small_ads_contents_highlighted',
            'small_ads_contents.promoted as small_ads_contents_promoted',
            'small_ads_contents.invoice as small_ads_contents_invoice',
            'small_ads_contents.date_end as small_ads_contents_date_end',
            'small_ads_contents.condition as small_ads_contents_condition',
            'small_ads_contents.small_ads_sub_categories_id as small_ads_contents_sub_categories_id',          
            'small_ads_categories.id as small_ads_categories_id',
            'small_ads_categories.name as small_ads_categories_name',
            'small_ads_categories.link as small_ads_categories_link',
            'small_ads_sub_categories.id as small_ads_sub_categories_id',
            'small_ads_sub_categories.name as small_ads_sub_categories_name',
            'small_ads_sub_categories.link as small_ads_sub_categories_link',
            'small_ads_photos.id as small_ads_photos_id',
            'small_ads_photos.name as small_ads_photos_name'
        )
        ->join('small_ads_categories', 'small_ads_contents.small_ads_categories_id', '=', 'small_ads_categories.id')
        ->join('small_ads_sub_categories', 'small_ads_contents.small_ads_sub_categories_id', '=', 'small_ads_sub_categories.id')        
        ->join('small_ads_photos', 'small_ads_contents.id', '=', 'small_ads_photos.small_ads_contents_id')
        ->where('small_ads_contents.status', 'active')        
        ->limit($howMutch)     
        ->get();

        //dd($results);
        return  $results;
    }

    //get oldest small_ads
    public function getLastChanse($howMutch)
    {
        $results =  $this->model
        ->select(
            'small_ads_contents.id as id',
            'small_ads_contents.id as small_ads_contents_id',
            'small_ads_contents.name as small_ads_contents_name',
            'small_ads_contents.lead as small_ads_contents_lead',
            'small_ads_contents.price as small_ads_contents_price',
            'small_ads_contents.date_start as small_ads_contents_date_start',
            'small_ads_contents.date_end as small_ads_contents_date_end',
            'small_ads_contents.recomended as small_ads_contents_recomended',
            'small_ads_contents.highlighted as small_ads_contents_highlighted',
            'small_ads_contents.promoted as small_ads_contents_promoted',
            'small_ads_contents.invoice as small_ads_contents_invoice',
            'small_ads_contents.date_end as small_ads_contents_date_end',
            'small_ads_contents.condition as small_ads_contents_condition',
            'small_ads_contents.small_ads_sub_categories_id as small_ads_contents_sub_categories_id',          
            'small_ads_categories.id as small_ads_categories_id',
            'small_ads_categories.name as small_ads_categories_name',
            'small_ads_categories.link as small_ads_categories_link',
            'small_ads_sub_categories.id as small_ads_sub_categories_id',
            'small_ads_sub_categories.name as small_ads_sub_categories_name',
            'small_ads_sub_categories.link as small_ads_sub_categories_link',
            'small_ads_photos.id as small_ads_photos_id'
        )
        ->join('small_ads_categories', 'small_ads_contents.small_ads_categories_id', '=', 'small_ads_categories.id')
        ->join('small_ads_sub_categories', 'small_ads_contents.small_ads_sub_categories_id', '=', 'small_ads_sub_categories.id')        
        ->join('small_ads_photos', 'small_ads_contents.id', '=', 'small_ads_photos.small_ads_contents_id')
   
        ->where('small_ads_contents.status', 'active')  
        ->orderBy('small_ads_contents_date_end', 'desc')
        ->limit($howMutch)     
        ->get();
         
        //dd($results);
        return  $results;
    }

    // download the most-viewed small_ads from last week 
   
    public function getTopView($howMutch)
    {
        $results =  $this->model
        ->select(
            'small_ads_contents.id as id',
            'small_ads_contents.id as small_ads_contents_id',
            'small_ads_contents.name as small_ads_contents_name',
            'small_ads_contents.lead as small_ads_contents_lead',
            'small_ads_contents.price as small_ads_contents_price',
            'small_ads_contents.date_start as small_ads_contents_date_start',
            'small_ads_contents.date_end as small_ads_contents_date_end',
            'small_ads_contents.recomended as small_ads_contents_recomended',
            'small_ads_contents.highlighted as small_ads_contents_highlighted',
            'small_ads_contents.promoted as small_ads_contents_promoted',
            'small_ads_contents.invoice as small_ads_contents_invoice',
            'small_ads_contents.date_end as small_ads_contents_date_end',
            'small_ads_contents.condition as small_ads_contents_condition',
            'small_ads_contents.small_ads_sub_categories_id as small_ads_contents_sub_categories_id',          
            'small_ads_categories.id as small_ads_categories_id',
            'small_ads_categories.name as small_ads_categories_name',
            'small_ads_categories.link as small_ads_categories_link',
            'small_ads_sub_categories.id as small_ads_sub_categories_id',
            'small_ads_sub_categories.name as small_ads_sub_categories_name',
            'small_ads_sub_categories.link as small_ads_sub_categories_link',
            'small_ads_photos.id as small_ads_photos_id'
        )
        ->join('small_ads_categories', 'small_ads_contents.small_ads_categories_id', '=', 'small_ads_categories.id')
        ->join('small_ads_sub_categories', 'small_ads_contents.small_ads_sub_categories_id', '=', 'small_ads_sub_categories.id')        
        ->join('small_ads_photos', 'small_ads_contents.id', '=', 'small_ads_photos.small_ads_contents_id')
        ->orderBy('small_ads_contents_date_end', 'desc')
        ->where('small_ads_contents.views', 'desc')        
        ->limit($howMutch)     
        ->get();
         
        //dd($results);
        return  $results;
    }


}

