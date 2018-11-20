<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Language;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\App;


class LanguageController extends Controller
{
    protected $language;
    
    public function __construct() {
        $this->language = new Language();
    }
    
    public function allLanguages()
    {
        
        $allLanguages = Language::all();
       
        return view('Language.index',compact('allLanguages'));
    }
    
    public function addLanguageForm()
    {
        $locales = Language::where('status',true)->get();
        
        return view('Language.add-language',compact('locales'));
    }
    
    public function insertLanguage(Request $request)
    {
       
         $validator = Validator::make($request->all(), [
            'title' => 'required',
             'status' => 'required',
             'serial_no'=>'numeric'
        ]);
       
         if ($validator->fails()) {
            return redirect('/Language/Add')
                        ->withErrors($validator)
                        ->withInput()
                   ->with([
                'message'    => 'Invalid Inputs!',
                'alert-type' => 'error',
            ]);         
        }
       
        $this->language->insertNewLanguage($request);
       
        return redirect()
            ->route('language.all')
            ->with([
                'message'    => 'Language Added Successfully!',
                'alert-type' => 'success',
            ]);
    }
    
    public function detailLanguage($id)
    {
        $language = Language::where('id', $id)->with('languageTranslations')->first();
        
        return view('Language.detail-language',compact('language'));
    }
    
    public function editLanguageForm($id)
    {
        $language = Language::where('id', $id)->with('languageTranslations')->first();
        $locales = Language::where('status',true)->get();
        
        return view('Language.edit-language',compact('language','locales'));
    }
    
    public function updateLanguage(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'title' => 'required',
             'status' => 'required',
             'serial_no'=>'numeric'
        ]);
       
         if ($validator->fails()) {
            return redirect('/Language/Edit/'.$request->id)
                        ->withErrors($validator)
                        ->withInput()
                   ->with([
                'message'    => 'Invalid Inputs!',
                'alert-type' => 'error',
            ]);         
        }
        
         $this->language->updateLanguage($request);
        
         
         return redirect()
            ->route('language.all')
            ->with([
                'message'    => 'Language Updated Successfully!',
                'alert-type' => 'success',
            ]);
         
    }
    
    public function deleteLanguage($id)
    {
         Language::where('id',$id)->delete();
         
       return redirect()
            ->route('language.all')
            ->with([
                'message'    => 'Language Deleted Successfully!',
                'alert-type' => 'success',
            ]);
        
    }
    
    public function bulkDeleteLanguages(Request $request)
    {
        
        $ids = explode(',', $request->ids);
       
        foreach($ids as $id)
        {
            Language::where('id',$id)->delete();
        }
        
        return redirect()
            ->route('language.all')
            ->with([
                'message'    => 'Languages Deleted Successfully!',
                'alert-type' => 'success',
            ]);
    }
    
}
