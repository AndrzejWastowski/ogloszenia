<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SmallAdsContent extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'id',
    'users_id',
    'name',
    'condition',
    'lead',
    'description',
    'items',
    'price',
    'date_start',
    'date_end',
    'small_ads_categories_id',
    'small_ads_sub_categories_id',
    'small_ads_user_group_id',
    'small_ads_classified_enum',
    'adress_id',
    'portal_id',
    'recomended',
    'highlighted',
    'promoted',
    'invoice',
    'status',
    'set_portal_id'
   ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
   'created_at', 'updated_at',
   ];

    public function small_ads_categories_id()
    {
        return $this->belongsTo(AdsCategorie::class, 'small_ads_categories_id');
    }

    public function small_ads_sub_categories_id()
    {
        return $this->belongsTo(AdsSubCategorie::class, 'small_ads_sub_categories_id');
    }

    public function photos()
    {
        return $this->hasMany(AdsPhoto::class, 'small_ads_contents_id');
    }

    /**
     * Display the first photo
     * return one database small_ads_photos record.
     */
    public function firstPhotos()
    {
        $result = $this->belongsTo(AdsPhoto::class, 'small_ads_contents_id');

        return $result;
    }

    public function user()
    {
        $result = $this->belongsTo(User::class, 'users_id');

        return $result;
    }

    /*
    |--------------------------------------------------------------------------
    | Getters
    |--------------------------------------------------------------------------
    */

    public function get_id(): int
    {
        return $this->id;
    }   

    public function get_users_id(): int
    {
        return $this->users_id;
    }

    public function get_name(): int
    {
        return $this->name;
    }

    public function get_condition(): string
    {
        return $this->condition;
    }
    

    public function get_description(): string
    {
        return $this->description;
    }

    public function get_items(): int
    {
        return $this->items;
    }

    public function get_price(): float
    {
        return $this->price;
    }

    public function get_date_start(): int
    {
        return $this->date_start;
    }

    public function get_date_end(): int
    {
        return $this->date_end;
    }

    public function get_small_ads_categories_id(): int
    {
        return $this->small_ads_categories_id;
    }

    public function get_small_ads_sub_categories_id(): int
    {
        return $this->small_ads_sub_categories_id;
    }

    public function get_small_ads_user_group_id(): int
    {
        return $this->small_ads_user_group_id;
    }

    public function get_small_ads_classified_enum(): string
    {
        return $this->small_ads_classified_enum;
    }

    public function get_adress_id(): int
    {
        return $this->adress_id;
    }

    public function get_recomended(): int
    {
        return $this->recomended;
    }

    public function get_highlighted(): string
    {
        return $this->highlighted;
    }

    public function get_promoted(): int
    {
        return $this->_promoted;
    }

    public function get_invoice(): string
    {
        return $this->invoice;
    }

    public function get_status(): string
    {
        return $this->status;
    }

    public function get_portal_id(): int
    {
        return $this->status;
    }
   
    /*
    |--------------------------------------------------------------------------
    | Setters
    |--------------------------------------------------------------------------
    */

    public function set_users_id(?int $value): void
    {
        $this->users_id = $value;
    }

    public function set_name(?string $value): void
    {
        $this->name  = $value;
    }

    public function set_condition(?string $value): void
    {
        $this->condition  = $value;
    }
    
    public function set_description(?string $value): void
    {
        $this->description  = $value;
    }

    public function set_lead(?string $value): void
    {
        $this->lead  = $value;
    }

    public function set_items(?int $value): void
    {
        $this->items  = $value;
    }

    public function set_price(?float $value): void
    {
        $this->price  = $value;
    }

    public function set_date_start(string $value): void
    {
        $this->date_start = $value;
    }

    public function set_date_end(?string $value): void
    {
        $this->date_end = $value;
    }

    public function set_small_ads_categories_id(int $value): void
    {
        $this->small_ads_categories_id = $value;
    }

    public function set_small_ads_sub_categories_id(int $value): void
    {
        $this->small_ads_sub_categories_id = $value;
    }

    public function set_small_ads_classified_enum(?string $value): void
    {
        $this->small_ads_classified_enum = $value;
    }

    public function set_adress_id(?int $value): void
    {
        $this->adress_id = $value;
    }

    public function set_recomended(string $value): void
    {
        $this->recomended = $value;
    }

    public function set_highlighted(?string $value): void
    {
        $this->highlighted = $value;
    }

    public function set_promoted(?bool $value): void
    {
        $this->promoted = $value;
    }

    public function set_invoice(?string $value): void
    {
        $this->invoice = $value;
    }

    public function set_status(?string $value): void
    {
        $this->status = $value;
    }
    public function set_portal_id(?int $value): void
    {
        $this->status = $value;
    }
}