<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\App;
use App\Banner;
use App\Language;
use App\BannerPage;


class BannerController extends Controller
{
     protected $banner;
    
    
    public function __construct() {
        $this->banner = new Banner();
    }
    public function allBanners()
    {     
        $allBanners = Banner::with('bannerPage')->get();
       
        return view('Banner.index',compact('allBanners'));
    }
    
    public function addBannerForm()
    {
        $locales = Language::where('status',true)->get();
        $pages = BannerPage::all();
        
        return view('Banner.add-banner',compact('locales','pages'));
    }
    
     public function insertBanner(Request $request)
    {
     
         $validator = Validator::make($request->all(), [
            'img_url' => 'required',
             'status' => 'required',
             'page' => 'required',
             'serial_no' => 'numeric'
        ]);
       
         if ($validator->fails()) {
            return redirect('/Banner/Add')
                        ->withErrors($validator)
                        ->withInput()
                   ->with([
                'message'    => 'Invalid Inputs!',
                'alert-type' => 'error',
            ]);         
        }
       
        $this->banner->insertNewBanner($request);
       
        return redirect()
            ->route('banner.all')
            ->with([
                'message'    => 'Banner Added Successfully!',
                'alert-type' => 'success',
            ]);
    }
    
    public function editBannerForm($id)
    {
        $banner = Banner::where('id', $id)->with('bannerTranslations')->first();
        
        
        $locales = Language::where('status',true)->get();
        $pages = BannerPage::all();
        
        return view('Banner.edit-banner',compact('banner','locales','pages'));
    }
    
    public function updateBanner(Request $request)
    {
        $validator = Validator::make($request->all(), [
            
             'status' => 'required',
             'page' => 'required',
             'serial_no'=>'numeric'
        ]);
       
         if ($validator->fails()) {
            return redirect('/Banner/Edit/'.$request->id)
                        ->withErrors($validator)
                        ->withInput()
                   ->with([
                'message'    => 'Invalid Inputs!',
                'alert-type' => 'error',
            ]);         
        }
        
         $this->banner->updateBanner($request);
        
         
         return redirect()
            ->route('banner.all')
            ->with([
                'message'    => 'Banner Updated Successfully!',
                'alert-type' => 'success',
            ]);
         
    }
    
    public function detailBanner($id)
    {
        
        $banner = Banner::where('id', $id)->with('bannerTranslations','bannerPage')->first();
       
        return view('Banner.detail-banner',compact('banner'));
    }
    
     public function deleteBanner($id)
    {
         Banner::where('id',$id)->delete();
         
       return redirect()
            ->route('banner.all')
            ->with([
                'message'    => 'Banner Deleted Successfully!',
                'alert-type' => 'success',
            ]);
        
    }
    
    public function bulkDeleteBanners(Request $request)
    {
        
        $ids = explode(',', $request->ids);
       
        foreach($ids as $id)
        {
            Banner::where('id',$id)->delete();
        }
        
        return redirect()
            ->route('banner.all')
            ->with([
                'message'    => 'Banners Deleted Successfully!',
                'alert-type' => 'success',
            ]);
    }
}
