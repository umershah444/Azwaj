<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationTranslation extends Model
{
    protected  $table = 'education_translations';
    
    protected $fillable = [
        'title','locale','education_id'
        ];
}
