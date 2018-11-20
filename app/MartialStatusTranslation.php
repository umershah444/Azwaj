<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MartialStatusTranslation extends Model
{
     protected  $table = 'martial_status_translations';
    
    protected $fillable = [
        'title','locale','martial_status_id'
        ];
}
