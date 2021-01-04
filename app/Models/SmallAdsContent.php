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
    'status'
   ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
   'created_at', 'updated_at',
   ];

    public function small_adsCategories()
    {
        return $this->belongsTo(AdsCategorie::class, 'small_ads_categories_id');
    }

    public function small_adsSubCategories()
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

    public function getId(): int
    {
        return $this->id;
    }   

    public function getUsersId(): int
    {
        return $this->users_id;
    }

    public function getName(): int
    {
        return $this->name;
    }

    public function getCondition(): string
    {
        return $this->condition;
    }
    

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getItems(): int
    {
        return $this->items;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getDateStart(): int
    {
        return $this->date_start;
    }

    public function getDateEnd(): int
    {
        return $this->date_end;
    }

    public function getCategoriesId(): int
    {
        return $this->small_ads_categories_id;
    }

    public function getSubCategoriesID(): int
    {
        return $this->small_ads_sub_categories_id;
    }

    public function getUserGroupId(): int
    {
        return $this->small_ads_user_group_id;
    }

    public function getAdsClassifiedEnum(): string
    {
        return $this->small_ads_classified_enum;
    }

    public function getAdressId(): int
    {
        return $this->adress_id;
    }

    public function getRecomended(): int
    {
        return $this->date_end;
    }

    public function getHighlighted(): string
    {
        return $this->date_end;
    }

    public function getPromoted(): int
    {
        return $this->date_end;
    }

    public function getInvoice(): string
    {
        return $this->invoice;
    }

    public function getStatus(): string
    {
        return $this->status;
    }
   
    /*
    |--------------------------------------------------------------------------
    | Setters
    |--------------------------------------------------------------------------
    */

    public function setUsersId(?int $value): void
    {
        $this->users_id = $value;
    }

    public function setName(?string $value): void
    {
        $this->name  = $value;
    }

    public function setCondition(?string $value): void
    {
        $this->condition  = $value;
    }
    
    public function setDescription(?string $value): void
    {
        $this->description  = $value;
    }

    public function setLead(?string $value): void
    {
        $this->lead  = $value;
    }

    public function setItems(?int $value): void
    {
        $this->items  = $value;
    }

    public function setPrice(?float $value): void
    {
        $this->price  = $value;
    }

    public function setDateStart(?string $value): void
    {
        $this->date_start = $value;
    }

    public function setDateEnd(?string $value): void
    {
        $this->date_end = $value;
    }

    public function setAdsCategoriesId(?int $value): void
    {
        $this->small_ads_categories_id = $value;
    }

    public function setAdsSubCategoriesId(?int $value): void
    {
        $this->small_ads_sub_categories_id = $value;
    }

    public function setUserGroupId(?int $value): void
    {
        $this->small_ads_user_group_id = $value;
    }

    public function setAdsClassifiedEnum(?string $value): void
    {
        $this->small_ads_classified_enum = $value;
    }

    public function setAdressId(?int $value): void
    {
        $this->adress_id = $value;
    }

    public function setRecomended(string $value): void
    {
        $this->recomended = $value;
    }

    public function setHighlighted(?string $value): void
    {
        $this->highlighted = $value;
    }

    public function setPromoted(?bool $value): void
    {
        $this->promoted = $value;
    }

    public function setInvoice(?string $value): void
    {
        $this->invoice = $value;
    }

    public function setStatus(?string $value): void
    {
        $this->status = $value;
    }
}