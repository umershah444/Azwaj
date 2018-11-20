<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Book;
use App\Language;
use App\Category;
use App\User;
use App\Questionnaire;

class BookController extends Controller
{
    protected $book;
    
    
    public function __construct() {
        $this->book = new Book();
    }
    public function allBooks()
    {     
        $allBooks = Book::all();
       
        return view('Book.index',compact('allBooks'));
    }
    
    public function addBookForm()
    {
        $locales = Language::where('status',true)->get();
        $categories = Category::all();
        $users = User::all();
        $questions = Questionnaire::all();
        
        return view('Book.add-book',compact('locales','categories','users','questions'));
    }
    
     public function insertBook(Request $request)
    {
         $messages = [
            'pdf.required' => 'The Book field is required.',
            'pdf.mimes' => 'The Book must be a pdf or docx.',
            ];
     
         $validator = Validator::make($request->all(), [
            'title' => 'required',
             'status' => 'required',
             'description' => 'max:200',
             'language_id' => 'required',
             'pdf' => 'required|mimes:pdf,docx',
             'serial_no' => 'numeric'
        ],$messages);
       
         
         
         if ($validator->fails()) {
            
            return redirect('/Book/Add')
                        ->withErrors($validator)
                        ->withInput()
                   ->with([
                'message'    => 'Invalid Inputs!',
                'alert-type' => 'error',
            ]);         
        }
       
        $this->book->insertNewBook($request);
       
        return redirect()
            ->route('book.all')
            ->with([
                'message'    => 'Book Added Successfully!',
                'alert-type' => 'success',
            ]);
    }
    
    public function editBookForm($id)
    {
        $book = Book::where('id', $id)->with('bookTranslations','bookCategories','bookSuggestBy','relatedQuestions')->first();
        
        $locales = Language::where('status',true)->get();
        $categories = Category::all();
        $users = User::all();
        $questions = Questionnaire::all();
        
        $relatedQuestions =array();
        if($book->relatedQuestions){
        foreach($book->relatedQuestions as $rA)
        {
            array_push($relatedQuestions, $rA->question_id);
        }}
        
        $bookCategories =array();
        foreach($book->bookCategories as $bC)
        {
            array_push($bookCategories, $bC->category_id);
        }
        
        return view('Book.edit-book',compact('book','categories','users','locales','bookCategories','questions','relatedQuestions'));
    }
    
    public function updateBook(Request $request)
    {
        $messages = [
            'pdf.required' => 'The Book field is required.',
            'pdf.mimes' => 'The Book must be a pdf or docx.',
            ];
       
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'pdf' => 'mimes:pdf,docx',
             'status' => 'required',
            'language_id' => 'required',
             'description' => 'max:200',
             'serial_no'=>'numeric'
        ],$messages);
       
         if ($validator->fails()) {
            return redirect('/Book/Edit/'.$request->id)
                        ->withErrors($validator)
                        ->withInput()
                   ->with([
                'message'    => 'Invalid Inputs!',
                'alert-type' => 'error',
            ]);         
        }
        
         $this->book->updateBook($request);
        
         
         return redirect()
            ->route('book.all')
            ->with([
                'message'    => 'Book Updated Successfully!',
                'alert-type' => 'success',
            ]);
         
    }
    
    public function detailBook($id)
    {
        
        $book = Book::where('id', $id)->with('bookTranslations','bookCategories','bookSuggestBy','relatedQuestions','videoLanguage')->first();
       
        return view('Book.detail-book',compact('book'));
    }
    
     public function deleteBook($id)
    {
         Book::where('id',$id)->delete();
         
       return redirect()
            ->route('book.all')
            ->with([
                'message'    => 'Book Deleted Successfully!',
                'alert-type' => 'success',
            ]);
        
    }
    
    public function bulkDeleteBooks(Request $request)
    {
        
        $ids = explode(',', $request->ids);
       
        foreach($ids as $id)
        {
            Book::where('id',$id)->delete();
        }
        
        return redirect()
            ->route('book.all')
            ->with([
                'message'    => 'Books Deleted Successfully!',
                'alert-type' => 'success',
            ]);
    }
    
    public function bookPreview($id)
    {
        $book = \App\BookTranslation::where('id',$id)->first();
       
        return view('Book.preview-book',compact('book'));
        /*try{
        return response()->file('upload'.$book->pdf);
        }
        catch(\Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException $e )
        {
        
        return redirect()
            ->back()
            ->with([
                'message'    => 'File not exist!',
                'alert-type' => 'error',
            ]);
        
        }*/
    }
}
