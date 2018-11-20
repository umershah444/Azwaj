<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionnaireTranslation extends Model
{
     protected $table = 'questionnaire_translations';
    protected $fillable = [
        'question_id','title', 'locale'
        ];
}
