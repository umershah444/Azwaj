<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BodyTypeTranslation extends Model
{
    protected  $table = 'body_type_translations';
    
    protected $fillable = [
        'title','locale','body_type_id'
        ];
}
