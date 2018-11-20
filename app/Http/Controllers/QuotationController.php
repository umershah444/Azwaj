<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quotation;
use App\Language;

use Illuminate\Support\Facades\Validator;

class QuotationController extends Controller
{
     protected $quotation;
    
    public function __construct() {
        $this->quotation = new Quotation();
    }
    
    public function allQuotations()
    {
        $allQuotations = Quotation::all();
       
        return view('Quotation.index',compact('allQuotations'));
    }
    
    public function addQuotationForm()
    {
        
        $locales = Language::where('status',true)->get();
       
        return view('Quotation.add-quotation',compact('locales'));
    }
    
    public function insertQuotation(Request $request)
    {
       
         $validator = Validator::make($request->all(), [
            'title' => 'required',
             'status' => 'required',
             'serial_no'=>'numeric'
        ]);
       
         if ($validator->fails()) {
            return redirect('/Quotation/Add')
                        ->withErrors($validator)
                        ->withInput()
                   ->with([
                'message'    => 'Invalid Inputs!',
                'alert-type' => 'error',
            ]);         
        }
       
        $this->quotation->insertNewQuotation($request);
       
        return redirect()
            ->route('quotation.all')
            ->with([
                'message'    => 'Quotation Added Successfully!',
                'alert-type' => 'success',
            ]);
    }
    
    public function detailQuotation($id)
    {
        $quotation = Quotation::where('id', $id)->with('quotationTranslations')->first();
        
        return view('Quotation.detail-quotation',compact('quotation'));
    }
    
    public function editQuotationForm($id)
    {
        $quotation = Quotation::where('id', $id)->with('quotationTranslations')->first();
        $locales = Language::where('status',true)->get();
        
        return view('Quotation.edit-quotation',compact('quotation','locales'));
    }
    
    public function updateQuotation(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'title' => 'required',
             'status' => 'required',
             'serial_no'=>'numeric'
        ]);
       
         if ($validator->fails()) {
            return redirect('/Quotation/Edit/'.$request->id)
                        ->withErrors($validator)
                        ->withInput()
                   ->with([
                'message'    => 'Invalid Inputs!',
                'alert-type' => 'error',
            ]);         
        }
        
         $this->quotation->updateQuotation($request);
        
         
         return redirect()
            ->route('quotation.all')
            ->with([
                'message'    => 'Quotation Updated Successfully!',
                'alert-type' => 'success',
            ]);
         
    }
    
    public function deleteQuotation($id)
    {
         Quotation::where('id',$id)->delete();
         
       return redirect()
            ->route('quotation.all')
            ->with([
                'message'    => 'Quotation Deleted Successfully!',
                'alert-type' => 'success',
            ]);
        
    }
    
    public function bulkDeleteQuotations(Request $request)
    {
        
        $ids = explode(',', $request->ids);
       
        foreach($ids as $id)
        {
            Quotation::where('id',$id)->delete();
        }
        
        return redirect()
            ->route('quotation.all')
            ->with([
                'message'    => 'Quotations Deleted Successfully!',
                'alert-type' => 'success',
            ]);
    }
}
