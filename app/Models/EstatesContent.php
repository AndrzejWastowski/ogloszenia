<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstatesContent extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lead', 'description', 'estates_categories_id', 'area', 'unit', 'estates_groups_id', 'market', 'price', 'user_id', 'active', 'date_add', 'date_start', 'date_end', 'adresses_id', 'portal_id', 'date_start', 'date_end', 'recomended', 'featured', 'promoted', 'invoice',
       ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'visitor_ip', 'visitor_host', 'visitor_soft', 'visitor_proxy', 'visitor_port', 'created_at', 'updated_at', 'portal_id',
       ];

    public function EstatesCategories()
    {
        return $this->belongsTo(EstatesCategorie::class, 'estates_categories_id');
    }


    public function EstatesGruos()
    {
        return $this->belongsTo(EstatesGroup::class, 'estates_groups_id');
    }

    public function photos()
    {
        return $this->hasMany(EstatesPhoto::class, 'estates_contents_id');
    }


    public function top_photos()
    {
        return $this->hasMany(EstatesPhoto::class,'estates_contents_id');
    }

    /**
     * Display the first photo
     * return one database ads_photos record.
     */
    public function firstPhotos()
    {
        $result = $this->belongsTo(EstatesPhoto::class, 'EstatesPhoto_contents_id');

        return $result;
    }

    public function user()
    {
        $result = $this->belongsTo(User::class, 'users_id');

        return $result;
    }
}
