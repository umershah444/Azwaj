<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    protected $fillable = [
        'article_id','category_id'
        ];
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    
    public function article()
    {
        return $this->belongsTo('App\Article');
    }
            
}
