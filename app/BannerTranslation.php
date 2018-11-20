<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BannerTranslation extends Model
{
    protected $table = 'banner_translations';
    protected $fillable = [
        'banner_id','title', 'locale'
        ];
}
