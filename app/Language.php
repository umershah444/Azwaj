<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use DB;

class Language extends Model
{
    use \Dimsav\Translatable\Translatable;
    
    public $translatedAttributes = ['title'];
    
    protected  $table = 'languages';
    
    protected $fillable = [
        'serial_no','locale','status','title'
        ];
    
    public function insertNewLanguage($request)
    {  
        $language =  Language::create(Input::except('title'));
        
        DB::table('language_translations')->insert(['language_id'=>$language->id,'title'=>$request->title,
             'locale'=>'en']);
        
        for($i = 0; $i < count($request->title_trans); $i++)
        {
            if($request->locales[$i] != null){
            DB::table('language_translations')->insert(['language_id'=>$language->id,'title'=>$request->title_trans[$i],
                    'locale'=>$request->locales[$i]]);
        }}
    }
    
     public function updateLanguage($request)
    {
        DB::table('languages')->where('id',$request->id)->update(['locale'=>$request->locale,'status'=>$request->status,'serial_no'=>$request->serial_no,'updated_at'=>date('Y-m-d H:i:s')]);
        
         DB::table('language_translations')->where('language_id',$request->id)->delete();
        
        DB::table('language_translations')->insert(['language_id'=>$request->id,'title'=>$request->title,
                    'locale'=>'en']);
        
        for($i = 0; $i < count($request->title_trans); $i++)
        {
            if($request->locales[$i] != null){
            DB::table('language_translations')->insert(['language_id'=>$request->id,'title'=>$request->title_trans[$i],
                    'locale'=>$request->locales[$i]]);
        }}
    }
    
    public function languageTranslations()
    {
        return $this->hasMany('App\LanguageTranslation');
    }
}
