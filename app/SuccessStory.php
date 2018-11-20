<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class SuccessStory extends Model
{
     protected  $table = 'success_stories';
    
    
    protected $fillable = [
        'user_id','partner_id','title','description','partner_approve','admin_approve','status','serial_no'
        ];
    
    public function submitUser()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function partner()
    {
        return $this->belongsTo('App\User','partner_id');
    }
    public function images()
    {
        return $this->hasMany('App\SuccessStoryImage','story_id');
    }
    
     public function updateSuccessStory($request)
    {
        
         DB::table('success_stories')->where('id',$request->id)->update(['title'=>$request->title,'description'=>$request->description,'status'=>$request->status,'serial_no'=>$request->serial_no,
                'updated_at' => date('Y-m-d H:i:s')]);
      
    }
    
}
