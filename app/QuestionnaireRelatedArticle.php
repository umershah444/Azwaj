<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionnaireRelatedArticle extends Model
{
    
    protected $fillable = [
        'article_id','question_id'
        ];
    
    public function question()
    {
        return $this->belongsTo('App\Questionnaire','question_id');
    }
    
    public function article()
    {
        return $this->belongsTo('App\Article');
    }
}
