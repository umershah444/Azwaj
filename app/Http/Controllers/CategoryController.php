<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Language;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\App;


class CategoryController extends Controller
{
    protected $category;
    
    public function __construct() {
        $this->category = new Category();
    }
    
    public function allCategorires()
    {
        App::setLocale('en');
        
        $allCategories = Category::all();
       
        return view('Category.index',compact('allCategories'));
    }
    
    public function addCategoryForm()
    {
        $locales = Language::where('status',true)->get();
        $categories = Category::all();
        
        return view('Category.add-category',compact('locales','categories'));
    }
    
    public function insertCategory(Request $request)
    {
       
         $validator = Validator::make($request->all(), [
            'title' => 'required',
             'display_in_home' => 'required',
             'status' => 'required',
             'description' => 'max:100',
             'serial_no'=>'numeric'
        ]);
       
         if ($validator->fails()) {
            return redirect('/Categories/Add')
                        ->withErrors($validator)
                        ->withInput()
                   ->with([
                'message'    => 'Invalid Inputs!',
                'alert-type' => 'error',
            ]);         
        }
       
        $this->category->insertNewCategory($request);
       
        return redirect()
            ->route('category.all')
            ->with([
                'message'    => 'Category Added Successfully!',
                'alert-type' => 'success',
            ]);
    }
    
    public function detailCategory($id)
    {
        $category = Category::where('id', $id)->with('categoryTranslations')->first();
        
        return view('Category.detail-category',compact('category'));
    }
    
    public function editCategoryForm($id)
    {
        $category = Category::where('id', $id)->with('categoryTranslations')->first();
        $locales = Language::where('status',true)->get();
        $categories = Category::all();
        
        return view('Category.edit-category',compact('category','locales','categories'));
    }
    
    public function updateCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
             'display_in_home' => 'required',
             'status' => 'required',
             'description' => 'max:100',
             'serial_no'=>'numeric'
        ]);
       
         if ($validator->fails()) {
            return redirect('/Categories/Edit/'.$request->id)
                        ->withErrors($validator)
                        ->withInput()
                   ->with([
                'message'    => 'Invalid Inputs!',
                'alert-type' => 'error',
            ]);         
        }
        
         $this->category->updateCategory($request);
        
         return redirect()
            ->route('category.all')
            ->with([
                'message'    => 'Category Updated Successfully!',
                'alert-type' => 'success',
            ]);
    }
    
    public function deleteCategory($id)
    {
         Category::where('id',$id)->delete();
         
       return redirect()
            ->route('category.all')
            ->with([
                'message'    => 'Category Deleted Successfully!',
                'alert-type' => 'success',
            ]);
        
    }
    
    public function bulkDeleteCategories(Request $request)
    {
        
        $ids = explode(',', $request->ids);
       
        foreach($ids as $id)
        {
            Category::where('id',$id)->delete();
        }
        
        return redirect()
            ->route('category.all')
            ->with([
                'message'    => 'Categories Deleted Successfully!',
                'alert-type' => 'success',
            ]);
    }
    
}
