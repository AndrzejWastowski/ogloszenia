<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SmallAdsPhoto extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    public $timestamps = false;
    protected $fillable = [
    'id', 'small_ads_contents_id', 'sort',
   ];

    

       /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
       ];

    protected $table = 'small_ads_photos';

    public function adsContent()
    {
        return $this->belongsTo(SmallAdsContent::class, 'id');
    }


}
