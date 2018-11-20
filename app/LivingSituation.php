<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LivingSituation extends Model
{
   use \Dimsav\Translatable\Translatable;
    
    public $translatedAttributes = ['title'];
    
    protected  $table = 'living_situations';
    
    protected $fillable = [
        'serial_no'
        ];
}
