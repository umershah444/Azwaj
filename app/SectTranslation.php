<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SectTranslation extends Model
{
    protected  $table = 'sect_translations';
    
    protected $fillable = [
        'title','locale','sect_id'
        ];
}
