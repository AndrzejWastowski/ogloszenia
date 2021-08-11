<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarsContent extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'name', 
        'lead', 
        'description', 
        'cars_brands_id', 
        'cars_models_id', 
        'cars_body_id',
        'color',
        'date_start',
        'date_end',
        'date_production',
        'date_registration' ,
        'country_registration',
        'power',
        'capacity',
        'dors_number',
        'seats',
        'condition',
        'demaged',
        'accident',
        'price',
        'mileage',
        'fuel_type',        
        'invoice',
        'status',
        'views',
        'contact_phone',
        'contact_email', 
        'adresses_id', 
        'master_portal',
        'promoted',
        'top',
        'highlighted',
        'recomended',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'adress_ip',
        'host',
        'port','
        browser',
        'portal_id',
    ];

    public function carsModels()
    {
        return $this->hasOne(CarsModel::class, 'cars_model_sid');
    }

    public function carsBrands()
    {
        return $this->hasOne(CarsBrands::class, 'cars_brands_id');
    }

    public function photos()
    {
        return $this->hasMany(CarsPhoto::class, 'cars_contents_id');
    }


    public function top_photos()
    {
        return $this->hasMany(CarsPhoto::class,'cars_contents_id');
    }

    /**
     * Display the first photo
     * return one database ads_photos record.
     */
    public function firstPhotos()
    {
        $result = $this->belongsTo(CarsPhoto::class, 'cars_contents_id');

        return $result;
    }

    public function user()
    {
        $result = $this->belongsTo(User::class, 'users_id');

        return $result;
    }
}
