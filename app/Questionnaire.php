<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use DB;

class Questionnaire extends Model
{
    use \Dimsav\Translatable\Translatable;
    
    const male = 1;
    const female = 2;
    const common = 3;
    
    public $translatedAttributes = ['title'];
    
    protected  $table = 'questionnaires';
    
    protected $fillable = [
        'gender_id','serial_no','status'
        ];
    
    public function gender()
    {
        return $this->belongsTo('App\Gender');
    }
    
    public function relatedVideos()
    {
        return $this->hasMany('App\QuestionnaireRelatedVideo','question_id')->with('video');
    }
    
    public function relatedArticles()
    {
        return $this->hasMany('App\QuestionnaireRelatedArticle','question_id')->with('article');
    }
    
    public function relatedBooks()
    {
        return $this->hasMany('App\QuestionnaireRelatedBook','question_id')->with('book');
    }
    
    public function questionnaireTranslations()
    {
        return $this->hasMany('App\QuestionnaireTranslation');
    }
    
    public function insertNewQuestionnaire($request)
    {
        
        $questionnaire_id = DB::table('questionnaires')->insertGetId(['status'=>$request->status,'serial_no'=>$request->serial_no,'gender_id'=>$request->gender_id
                ,'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')]);
      
        if($request->has('related_articles'))
        {
            foreach($request->related_articles as $article)
            {
                DB::table('questionnaire_related_articles')->insert(['question_id'=>$questionnaire_id
                        ,'article_id'=>$article]);
            }
        }
        
        if($request->has('related_books'))
        {
            foreach($request->related_books as $book)
            {
                DB::table('questionnaire_related_books')->insert(['question_id'=>$questionnaire_id
                        ,'book_id'=>$book]);
            }
        }
        
        if($request->has('related_videos'))
        {
            foreach($request->related_videos as $video)
            {
                DB::table('questionnaire_related_videos')->insert(['question_id'=>$questionnaire_id
                        ,'video_id'=>$video]);
            }
        }
        
        DB::table('questionnaire_translations')->insert(['questionnaire_id'=>$questionnaire_id,'title'=>$request->title,
                    'locale'=>'en']);
        
        if($request->title_trans)
        {
            for($i = 0; $i < count($request->title_trans); $i++)
            {
                if($request->locales[$i] != null)
                    {
                    DB::table('questionnaire_translations')->insert(['questionnaire_id'=>$questionnaire_id,'title'=>$request->title_trans[$i],
                    'locale'=>$request->locales[$i]]);
                    
                    }
            }
            
        }
    }
    
    public function updateQuestionnaire($request)
    {
        
         DB::table('questionnaires')->where('id',$request->id)->update(['status'=>$request->status,'serial_no'=>$request->serial_no,'gender_id'=>$request->gender_id
                ,'updated_at' => date('Y-m-d H:i:s')]);
      
         DB::table('questionnaire_related_articles')->where('question_id',$request->id)->delete();
        if($request->has('related_articles'))
        {
            foreach($request->related_articles as $article)
            {
                DB::table('questionnaire_related_articles')->insert(['question_id'=>$request->id
                        ,'article_id'=>$article]);
            }
        }
        DB::table('questionnaire_related_books')->where('question_id',$request->id)->delete();
        if($request->has('related_books'))
        {
            foreach($request->related_books as $book)
            {
                DB::table('questionnaire_related_books')->insert(['question_id'=>$request->id
                        ,'book_id'=>$book]);
            }
        }
        DB::table('questionnaire_related_videos')->where('question_id',$request->id)->delete();
        if($request->has('related_videos'))
        {
            foreach($request->related_videos as $video)
            {
                DB::table('questionnaire_related_videos')->insert(['question_id'=>$request->id
                        ,'video_id'=>$video]);
            }
        }
        
        DB::table('questionnaire_translations')->where('questionnaire_id',$request->id)->delete();
        
        DB::table('questionnaire_translations')->insert(['questionnaire_id'=>$request->id,'title'=>$request->title,
                    'locale'=>'en']);
        
        if($request->title_trans)
        {
            for($i = 0; $i < count($request->title_trans); $i++)
            {
                if($request->locales[$i] != null)
                    {
                    DB::table('questionnaire_translations')->insert(['questionnaire_id'=>$request->id,'title'=>$request->title_trans[$i],
                    'locale'=>$request->locales[$i]]);
                    
                    }
            }
            
        }
    }
    
}
