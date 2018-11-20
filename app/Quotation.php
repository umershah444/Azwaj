<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use DB;

class Quotation extends Model
{
    use \Dimsav\Translatable\Translatable;
    
    public $translatedAttributes = ['title','reference'];
    
    protected  $table = 'quotations';
    
    protected $fillable = [
        'serial_no','status'
        ];
    
    
    public function quotationTranslations()
    {
        return $this->hasMany('App\QuotationTranslation');
    }
    
    public function insertNewQuotation($request)
    {
        
        $quotation_id = DB::table('quotations')->insertGetId(['status'=>$request->status,'serial_no'=>$request->serial_no,
            'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')]);
      
        
        
        DB::table('quotation_translations')->insert(['quotation_id'=>$quotation_id,'title'=>$request->title,
                    'reference'=>$request->reference,'locale'=>'en']);
        
        if($request->title_trans)
        {
            for($i = 0; $i < count($request->title_trans); $i++)
            {
                if($request->locales[$i] != null)
                    {
                    DB::table('quotation_translations')->insert(['quotation_id'=>$quotation_id,'title'=>$request->title_trans[$i],
                    'reference'=>$request->reference_trans[$i],'locale'=>$request->locales[$i]]);
                    
                    }
            }
            
        }
    }
    
    public function updateQuotation($request)
    {
        
         DB::table('quotations')->where('id',$request->id)->update(['status'=>$request->status,'serial_no'=>$request->serial_no,
                'updated_at' => date('Y-m-d H:i:s')]);
      
        DB::table('quotation_translations')->where('quotation_id',$request->id)->delete();
        
        DB::table('quotation_translations')->insert(['quotation_id'=>$request->id,'title'=>$request->title,
                    'reference'=>$request->reference,'locale'=>'en']);
        
        if($request->title_trans)
        {
            for($i = 0; $i < count($request->title_trans); $i++)
            {
                if($request->locales[$i] != null)
                    {
                    DB::table('quotation_translations')->insert(['quotation_id'=>$request->id,'title'=>$request->title_trans[$i],
                    'reference'=>$request->reference_trans[$i],'locale'=>$request->locales[$i]]);
                    
                    }
            }
            
        }
    }
}
