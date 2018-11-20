<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionnaireRelatedVideo extends Model
{
    protected $fillable = [
        'video_id','question_id'
        ];
    
    public function question()
    {
        return $this->belongsTo('App\Questionnaire','question_id');
    }
    
    public function video()
    {
        return $this->belongsTo('App\Video');
    }
}
