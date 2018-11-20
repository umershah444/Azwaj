<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoCategory extends Model
{
    protected $fillable = [
        'video_id','category_id'
        ];
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    
    public function video()
    {
        return $this->belongsTo('App\Video');
    }
}
