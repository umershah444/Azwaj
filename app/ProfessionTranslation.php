<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfessionTranslation extends Model
{
     protected  $table = 'profession_translations';
    
    protected $fillable = [
        'title','locale','profession_id'
        ];
}
