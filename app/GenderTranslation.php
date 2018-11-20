<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GenderTranslation extends Model
{
    protected  $table = 'gender_translations';
    
    protected $fillable = [
        'title','locale','gender_id'
        ];
}
