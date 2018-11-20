<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LivingSituationTranslation extends Model
{
    protected  $table = 'living_situation_translations';
    
    protected $fillable = [
        'title','locale','living_situation_id'
        ];
}
