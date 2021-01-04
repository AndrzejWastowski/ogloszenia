<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SmallAdsSubCategorie extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'small_ads_categories_id', 'name', 'description'];

    /*
    * The attributes that are mass assignable.
    *
    * @var array
    */
}
