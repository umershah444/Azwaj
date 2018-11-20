<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DietTranslation extends Model
{
    protected  $table = 'diet_translations';
    
    protected $fillable = [
        'title','locale','diet_id'
        ];
}
