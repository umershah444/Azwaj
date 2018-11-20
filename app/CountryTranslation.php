<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountryTranslation extends Model
{
    protected  $table = 'country_translations';
    
    protected $fillable = [
        'title','locale','country_id'
        ];
}
