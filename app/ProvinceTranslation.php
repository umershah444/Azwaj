<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProvinceTranslation extends Model
{
     protected  $table = 'province_translations';
    
    protected $fillable = [
        'title','locale','province_id'
        ];
}
