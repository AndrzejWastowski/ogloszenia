<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewspaperEdition extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id' , 'newspaper_id', 'date','description', 'status'];

    protected $table = 'newspaper_edition';


}
