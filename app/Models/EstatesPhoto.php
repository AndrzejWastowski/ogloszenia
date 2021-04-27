<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstatesPhoto extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    public $timestamps = false;
    protected $fillable = [
    'id', 'estates_contents_id', 'name', 'sort',
   ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    'created_at', 'updated_at',
   ];

    public function estatesContent()
    {
        return $this->belongsTo(EstatesContent::class, 'id');
    }
}
