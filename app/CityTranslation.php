<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CityTranslation extends Model
{
    protected  $table = 'city_translations';
    
    protected $fillable = [
        'title','locale','city_id'
        ];
}
