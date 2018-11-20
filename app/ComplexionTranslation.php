<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComplexionTranslation extends Model
{
    protected  $table = 'complexion_translations';
    
    protected $fillable = [
        'title','locale','complexion_id'
        ];
}
