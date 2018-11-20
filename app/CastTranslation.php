<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CastTranslation extends Model
{
    protected  $table = 'cast_translations';
    
    protected $fillable = [
        'title','locale','cast_id'
        ];
}
