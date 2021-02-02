<?php

declare(strict_types=1);

namespace  App\Repositories\Eloquent;

use App\Models\SmallAdsPhoto;
use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class SmallAdsPhotosRepository extends BaseRepository
{
    public function __construct(SmallAdsPhoto $model)
    {
        $this->model = $model;
    }

    public function save(SmallAdsPhoto $photo):bool
    {
        return $photo->save();
    }
    
    public function getAllPhotosByAd($id): ?Collection
    {
        return $this->model->where('small_ads_contents_id', $id)->orderBy('sort', 'asc')->get();
    }

    public function getFirstPhotosByAd($id)  :?SmallAdsPhoto
    {
        return $this->model->where('small_ads_contents_id', $id)->orderBy('sort', 'asc')->first();
    }

    public function getLastPhotoByAd($id) :?SmallAdsPhoto
    {
        return $this->model->where('small_ads_contents_id', $id)->orderBy('sort', 'desc')->first();
    }
    
}
