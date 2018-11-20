<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionnaireRelatedBook extends Model
{
    protected $fillable = [
        'book_id','question_id'
        ];
    
    public function question()
    {
        return $this->belongsTo('App\Questionnaire','question_id');
    }
    
    public function book()
    {
        return $this->belongsTo('App\Book');
    }
}
