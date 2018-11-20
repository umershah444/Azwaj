<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReligionTranslation extends Model
{
     protected  $table = 'religion_translations';
    
    protected $fillable = [
        'title','locale','religion_id'
        ];
}
