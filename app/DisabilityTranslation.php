<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DisabilityTranslation extends Model
{
    protected  $table = 'disability_translations';
    
    protected $fillable = [
        'title','locale','disability_id'
        ];
}
