<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Input;

class Category extends Model
{
    use \Dimsav\Translatable\Translatable;
    
    public $translatedAttributes = ['title','description'];
    
    protected  $table = 'categories';
    
    
    protected $fillable = [
        'display_in_home','status','serial_no','img_url'
        ];
    
    public function categoryArticles()
    {
        return $this->hasMany('App\ArticleCategory','category_id')->with('article');
    }
    
    public function categoryBooks()
    {
        return $this->hasMany('App\BookCategory')->with('book');
    }
    
    public function categoryVideos()
    {
        return $this->hasMany('App\VideoCategory')->with('video');
    }
    
    
    public function insertNewCategory($request)
    {
        $category =  Category::create(Input::except('img_url','title','description'));
       
        $imgPath = upload_image($category->id, 'Category', 'img_url', 408, 224);
     
        Category::where('id', $category->id)->update(['img_url' => $imgPath]);
        
        DB::table('category_translations')->insert(['category_id'=>$category->id,'title'=>$request->title,
                    'description'=>$request->description,'locale'=>'en',
                'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')]);
        
        for($i = 0; $i < count($request->title_trans); $i++)
        {
            if($request->locales[$i] != null){
            DB::table('category_translations')->insert(['category_id'=>$category->id,'title'=>$request->title_trans[$i],
                    'description'=>$request->description_trans[$i],'locale'=>$request->locales[$i],
                'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')]);
        }}
    }
    
     public function updateCategory($request)
    {
        DB::table('categories')->where('id',$request->id)->update(['display_in_home'=>$request->display_in_home,'status'=>$request->status,'serial_no'=>$request->serial_no,'updated_at'=>date('Y-m-d H:i:s')]);
       
        if($request->has('img_url'))
         {
             $imgPath = upload_image($request->id, 'Category', 'img_url', 408, 224);
             Category::where('id', $request->id)->update(['img_url' => $imgPath]);
             
         }
        
         DB::table('category_translations')->where('category_id',$request->id)->delete();
        
        DB::table('category_translations')->insert(['category_id'=>$request->id,'title'=>$request->title,
                    'description'=>$request->description,'locale'=>'en',
                'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')]);
        
        for($i = 0; $i < count($request->title_trans); $i++)
        {
            if($request->locales[$i] != null){
            DB::table('category_translations')->insert(['category_id'=>$request->id,'title'=>$request->title_trans[$i],
                    'description'=>$request->description_trans[$i],'locale'=>$request->locales[$i],
                'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')]);
        }}
    }
    
    public function categoryTranslations()
    {
        return $this->hasMany('App\CategoryTranslation');
    }
    
  
}
