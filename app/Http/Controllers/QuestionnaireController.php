<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Book;
use App\Video;
use App\Questionnaire;
use App\Language;
use App\Gender;
use Illuminate\Support\Facades\Validator;


class QuestionnaireController extends Controller
{
     protected $questionnaire;
    
    public function __construct() {
        $this->questionnaire = new Questionnaire();
    }
    
    public function allQuestionnaires()
    {
        $allQuestionnaires = Questionnaire::all();
       
        return view('Questionnaire.index',compact('allQuestionnaires'));
    }
    
    public function addQuestionnaireForm()
    {
        
        $locales = Language::where('status',true)->get();
        $genders = Gender::all();
        
        //////////////Related///////////////////
        $articles = Article::all();
        $books = Book::all();
        $videos = Video::all();
        
        
        return view('Questionnaire.add-questionnaire',compact('locales','genders','articles','books','videos'));
    }
    
    public function insertQuestionnaire(Request $request)
    {
       
         $validator = Validator::make($request->all(), [
            'title' => 'required',
             'status' => 'required',
             'serial_no'=>'numeric'
        ]);
       
         if ($validator->fails()) {
            return redirect('/Questionnaire/Add')
                        ->withErrors($validator)
                        ->withInput()
                   ->with([
                'message'    => 'Invalid Inputs!',
                'alert-type' => 'error',
            ]);         
        }
       
        $this->questionnaire->insertNewQuestionnaire($request);
       
        return redirect()
            ->route('questionnaire.all')
            ->with([
                'message'    => 'Questionnaire Added Successfully!',
                'alert-type' => 'success',
            ]);
    }
    
    public function detailQuestionnaire($id)
    {
        $questionnaire = Questionnaire::where('id', $id)->with('questionnaireTranslations','gender','relatedArticles','relatedBooks','relatedVideos')->first();
        
        return view('Questionnaire.detail-questionnaire',compact('questionnaire'));
    }
    
    public function editQuestionnaireForm($id)
    {
        $questionnaire = Questionnaire::where('id', $id)->with('questionnaireTranslations','gender','relatedArticles','relatedBooks','relatedVideos')->first();
        $locales = Language::where('status',true)->get();
        $genders = Gender::all();
        
        //////////////Related///////////////////
        $articles = Article::all();
        $books = Book::all();
        $videos = Video::all();
        
        $relatedArticles =array();
        if($questionnaire->relatedArticles){
        foreach($questionnaire->relatedArticles as $rA)
        {
            array_push($relatedArticles, $rA->article_id);
        }}
        $relatedBooks =array();
        if($questionnaire->relatedBooks){
        foreach($questionnaire->relatedBooks as $rA)
        {
            array_push($relatedBooks, $rA->book_id);
        }}
        $relatedVideos =array();
        if($questionnaire->relatedVideos){
        foreach($questionnaire->relatedVideos as $rA)
        {
            array_push($relatedVideos, $rA->video_id);
        }}
        //dd($relatedArticles);
        
        return view('Questionnaire.edit-questionnaire',compact('questionnaire','locales','genders','articles','books','videos','relatedArticles','relatedBooks','relatedVideos'));
    }
    
    public function updateQuestionnaire(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'title' => 'required',
             
             'status' => 'required',
             
             'serial_no'=>'numeric'
        ]);
       
         if ($validator->fails()) {
            return redirect('/Questionnaire/Edit/'.$request->id)
                        ->withErrors($validator)
                        ->withInput()
                   ->with([
                'message'    => 'Invalid Inputs!',
                'alert-type' => 'error',
            ]);         
        }
        
         $this->questionnaire->updateQuestionnaire($request);
        
         
         return redirect()
            ->route('questionnaire.all')
            ->with([
                'message'    => 'Questionnaire Updated Successfully!',
                'alert-type' => 'success',
            ]);
         
    }
    
    public function deleteQuestionnaire($id)
    {
         Questionnaire::where('id',$id)->delete();
         
       return redirect()
            ->route('questionnaire.all')
            ->with([
                'message'    => 'Questionnaire Deleted Successfully!',
                'alert-type' => 'success',
            ]);
        
    }
    
    public function bulkDeleteQuestionnaires(Request $request)
    {
        
        $ids = explode(',', $request->ids);
       
        foreach($ids as $id)
        {
            Questionnaire::where('id',$id)->delete();
        }
        
        return redirect()
            ->route('questionnaire.all')
            ->with([
                'message'    => 'Questionnaires Deleted Successfully!',
                'alert-type' => 'success',
            ]);
    }
}
