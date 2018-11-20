<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use DB;

class Video extends Model
{
    use \Dimsav\Translatable\Translatable;
    
    public $translatedAttributes = ['title','description'];
    
    protected  $table = 'videos';
    
    
    protected $fillable = [
        'link','status','serial_no','img_url','suggest_by','language_id'
        ];
    
    public function videoTranslations()
    {
        return $this->hasMany('App\VideoTranslation');
    }
    
    public function videoCategories()
    {
        return $this->hasMany('App\VideoCategory')->with('category');
    }
    
    public function videoSuggestBy()
    {
        return $this->belongsTo('App\User' ,'suggest_by');
    }
    
     public function videolanguage()
    {
        return $this->belongsTo('App\Language','language_id');
    }
    
    public function relatedQuestions()
    {
        return $this->hasMany('App\QuestionnaireRelatedVideo','video_id')->with('question');
    }
    
    public function insertNewVideo($request)
    {
        $video =  Video::create(Input::except('img_url','title','description'));
        
        if($request->category_ids){
        foreach($request->category_ids as $category)
        {
            DB::table('video_categories')->insert(['video_id'=>$video->id,'category_id'=>$category]);
        }}
        
        if($request->has('related_questions'))
        {
            foreach($request->related_questions as $question)
            {
                DB::table('questionnaire_related_videos')->insert(['question_id'=>$question
                        ,'video_id'=>$video->id]);
            }
        }
       
        $imgPath = upload_image($video->id, 'Video', 'img_url', 224, 427);
     
        Video::where('id', $video->id)->update(['img_url' => $imgPath]);
        
        
        DB::table('video_translations')->insert(['video_id'=>$video->id,'title'=>$request->title,
                    'description'=>$request->description,'locale'=>'en']);
        
        for($i = 0; $i < count($request->title_trans); $i++)
        {
            if($request->locales[$i] != null){
            DB::table('video_translations')->insert(['video_id'=>$video->id,'title'=>$request->title_trans[$i],
                    'description'=>$request->description_trans[$i],'locale'=>$request->locales[$i]]);
        }}
    }
    
    public function updateVideo($request)
    {
        DB::table('videos')->where('id',$request->id)->update(['language_id'=>$request->language_id,'link'=>$request->link,'status'=>$request->status,'serial_no'=>$request->serial_no,'updated_at'=>date('Y-m-d H:i:s')]);
       
        DB::table('video_categories')->where('video_id',$request->id)->delete();
        
        if($request->category_ids){
        foreach($request->category_ids as $category)
        {
            DB::table('video_categories')->insert(['video_id'=>$request->id,'category_id'=>$category]);
        }}
        
        DB::table('questionnaire_related_videos')->where('video_id',$request->id)->delete();
        if($request->has('related_questions'))
        {
            foreach($request->related_questions as $question)
            {
                DB::table('questionnaire_related_videos')->insert(['question_id'=>$question
                        ,'video_id'=>$request->id]);
            }
        }
        
        
         if($request->has('img_url'))
         {
             $imgPath = upload_image($request->id, 'Video', 'img_url', 224, 427);
             Video::where('id', $request->id)->update(['img_url' => $imgPath]);
             
         }
        
         DB::table('video_translations')->where('video_id',$request->id)->delete();
        
        DB::table('video_translations')->insert(['video_id'=>$request->id,'title'=>$request->title,
                    'description'=>$request->description,'locale'=>'en'
                ]);
        
        for($i = 0; $i < count($request->title_trans); $i++)
        {
            if($request->locales[$i] != null){
            DB::table('video_translations')->insert(['video_id'=>$request->id,'title'=>$request->title_trans[$i],
                    'description'=>$request->description_trans[$i],'locale'=>$request->locales[$i]
                ]);
            }   }
    }
}
