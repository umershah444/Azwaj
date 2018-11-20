<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleTranslation extends Model
{
    protected $table = 'article_translations';
    protected $fillable = [
        'article_id','title', 'locale'
        ];
}
