<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuccessStory;

use Illuminate\Support\Facades\Validator;

class SuccessStoryController extends Controller
{
     protected $story;
    
    public function __construct() {
        $this->story = new SuccessStory();
    }
    
    public function allSuccessStories()
    {
        $allSuccessStories = SuccessStory::with('submitUser','partner')->get();
       
        return view('SuccessStory.index',compact('allSuccessStories'));
    }
    
    
    public function detailSuccessStory($id)
    {
        $story = SuccessStory::where('id', $id)->with('submitUser','partner','images')->first();
        
        return view('SuccessStory.detail-story',compact('story'));
    }
    
    public function editSuccessStoryForm($id)
    {
        $story = SuccessStory::where('id', $id)->with('submitUser','partner','images')->first();
        
        return view('SuccessStory.edit-story',compact('story'));
    }
    
    public function updateSuccessStory(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'title' => 'required',
             'status' => 'required',
             'serial_no'=>'numeric'
        ]);
       
         if ($validator->fails()) {
            return redirect('/Success-Story/Edit/'.$request->id)
                        ->withErrors($validator)
                        ->withInput()
                   ->with([
                'message'    => 'Invalid Inputs!',
                'alert-type' => 'error',
            ]);         
        }
        
         $this->story->updateSuccessStory($request);
        
         
         return redirect()
            ->route('story.all')
            ->with([
                'message'    => 'Success Story Updated Successfully!',
                'alert-type' => 'success',
            ]);
         
    }
    
    public function deleteSuccessStory($id)
    {
        SuccessStory::where('id',$id)->delete();
         
       return redirect()
            ->route('story.all')
            ->with([
                'message'    => 'Success Story Deleted Successfully!',
                'alert-type' => 'success',
            ]);
        
    }
    
    public function bulkDeleteSuccessStories(Request $request)
    {
        
        $ids = explode(',', $request->ids);
       
        foreach($ids as $id)
        {
            SuccessStory::where('id',$id)->delete();
        }
        
        return redirect()
            ->route('story.all')
            ->with([
                'message'    => 'Success Story Deleted Successfully!',
                'alert-type' => 'success',
            ]);
    }
}
