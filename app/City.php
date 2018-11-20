<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
   use \Dimsav\Translatable\Translatable;
    
    public $translatedAttributes = ['title'];
    
    protected  $table = 'cities';
    
    protected $fillable = [
        'serial_no'
        ];
}
