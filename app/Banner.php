<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use DB;

class Banner extends Model
{
    use \Dimsav\Translatable\Translatable;
    
    public $translatedAttributes = ['title'];
    
    protected  $table = 'banners';
    
    
    protected $fillable = [
        'page','status','serial_no','img_url'
        ];
    
    public function bannerTranslations()
    {
        return $this->hasMany('App\BannerTranslation');
    }
    
    public function bannerPage()
    {
        return $this->belongsTo('App\BannerPage','page');
    }
    
    public function insertNewBanner($request)
    {
        $banner =  Banner::create(Input::except('title'));
        
        if($request->page == BannerPage::Home)
        {
        $imgPath = upload_image($banner->id, 'Banner', 'img_url', 1600, 670);
        Banner::where('id', $banner->id)->update(['img_url' => $imgPath]);
        }
        else
        {$imgPath = upload_image($banner->id, 'Banner', 'img_url', 1600, 311);
        Banner::where('id', $banner->id)->update(['img_url' => $imgPath]);
        }
       
        
        DB::table('banner_translations')->insert(['banner_id'=>$banner->id,'title'=>$request->title,
                    'locale'=>'en']);
        
        for($i = 0; $i < count($request->title_trans); $i++)
        {
            if($request->locales[$i] != null){
            DB::table('banner_translations')->insert(['banner_id'=>$banner->id,'title'=>$request->title_trans[$i],
                    'locale'=>$request->locales[$i]]);
        }}
    }
    
    public function updateBanner($request)
    {
        DB::table('banners')->where('id',$request->id)->update(['page'=>$request->page,'status'=>$request->status,'serial_no'=>$request->serial_no,'updated_at'=>date('Y-m-d H:i:s')]);
       
         if (Input::hasFile('img_url'))
         {
             if($request->page == BannerPage::Home)
                 {
                 $imgPath = upload_image($request->id, 'Banner', 'img_url', 1600, 670);
                 Banner::where('id', $request->id)->update(['img_url' => $imgPath]);
                 
                 }
                 else
                     {
                     $imgPath = upload_image($request->id, 'Banner', 'img_url', 1600, 311);
                     Banner::where('id', $request->id)->update(['img_url' => $imgPath]);
                     
                     }
             
         }
        
         DB::table('banner_translations')->where('banner_id',$request->id)->delete();
        
        DB::table('banner_translations')->insert(['banner_id'=>$request->id,'title'=>$request->title,
                    'locale'=>'en'
                ]);
        
        for($i = 0; $i < count($request->title_trans); $i++)
        {
            if($request->locales[$i] != null){
            DB::table('banner_translations')->insert(['banner_id'=>$request->id,'title'=>$request->title_trans[$i],
                    'locale'=>$request->locales[$i]
                ]);
        }}
    }
}
