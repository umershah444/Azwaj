<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoTranslation extends Model
{
    protected $table = 'video_translations';
    protected $fillable = [
        'video_id','title', 'description', 'locale'
        ];
}
