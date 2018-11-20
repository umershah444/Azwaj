<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use DB;

class Article extends Model
{
    use \Dimsav\Translatable\Translatable;
    
    public $translatedAttributes = ['title'];
    
    protected  $table = 'articles';
    
    
    protected $fillable = [
        'reference','status','serial_no','img_url','suggest_by','language_id','description'
        ];
    
    public function articleTranslations()
    {
        return $this->hasMany('App\ArticleTranslation');
    }
    
    public function articleCategories()
    {
        return $this->hasMany('App\ArticleCategory')->with('category');
    }
    
    public function articleSuggestBy()
    {
        return $this->belongsTo('App\User' ,'suggest_by');
    }
    
    public function articlelanguage()
    {
        return $this->belongsTo('App\Language','language_id');
    }
    
    public function insertNewArticle($request)
    {
        $article =  Article::create(Input::except('img_url','title'));
        
        if($request->category_ids){
        foreach($request->category_ids as $category)
        {
            DB::table('article_categories')->insert(['article_id'=>$article->id,'category_id'=>$category]);
        }}
        
        if($request->has('related_questions'))
        {
            foreach($request->related_questions as $question)
            {
                DB::table('questionnaire_related_articles')->insert(['question_id'=>$question
                        ,'article_id'=>$article->id]);
            }
        }
       
        $imgPath = upload_image($article->id, 'Article', 'img_url', 224, 427);
     
        Article::where('id', $article->id)->update(['img_url' => $imgPath]);
        
        
        DB::table('article_translations')->insert(['article_id'=>$article->id,'title'=>$request->title,
                    'locale'=>'en']);
        
        for($i = 0; $i < count($request->title_trans); $i++)
        {
            if($request->locales[$i] != null){
            DB::table('article_translations')->insert(['article_id'=>$article->id,'title'=>$request->title_trans[$i],
                    'locale'=>$request->locales[$i]]);
        }}
    }
    
    public function updateArticle($request)
    {
        DB::table('articles')->where('id',$request->id)->update(['description'=>$request->description,'language_id'=>$request->language_id,'reference'=>$request->reference,'status'=>$request->status,'serial_no'=>$request->serial_no,'updated_at'=>date('Y-m-d H:i:s')]);
       
        DB::table('article_categories')->where('article_id',$request->id)->delete();
        
        if($request->category_ids){
        foreach($request->category_ids as $category)
        {
            DB::table('article_categories')->insert(['article_id'=>$request->id,'category_id'=>$category]);
        }}
        
        DB::table('questionnaire_related_articles')->where('article_id',$request->id)->delete();
        if($request->has('related_questions'))
        {
            foreach($request->related_questions as $question)
            {
                DB::table('questionnaire_related_articles')->insert(['question_id'=>$question
                        ,'article_id'=>$request->id]);
            }
        }
        
        if (Input::hasFile('img_url'))
         {
             $imgPath = upload_image($request->id, 'Article', 'img_url', 224, 427);
             Article::where('id', $request->id)->update(['img_url' => $imgPath]);
             
         }
        
         DB::table('article_translations')->where('article_id',$request->id)->delete();
        
        DB::table('article_translations')->insert(['article_id'=>$request->id,'title'=>$request->title,
                    'locale'=>'en'
                ]);
        
        for($i = 0; $i < count($request->title_trans); $i++)
        {
            if($request->locales[$i] != null){
            DB::table('article_translations')->insert(['article_id'=>$request->id,'title'=>$request->title_trans[$i],
                    'locale'=>$request->locales[$i]
                ]);
        }}
    }
    
     public function relatedQuestions()
    {
        return $this->hasMany('App\QuestionnaireRelatedArticle','article_id')->with('question');
    }
}
