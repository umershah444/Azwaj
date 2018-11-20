<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LanguageTranslation extends Model
{
    protected  $table = 'language_translations';
    
    protected $fillable = [
        'title','locale','language_id'
        ];
}
