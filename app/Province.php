<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use \Dimsav\Translatable\Translatable;
    
    public $translatedAttributes = ['title'];
    
    protected  $table = 'provinces';
    
    protected $fillable = [
        'serial_no'
        ];
}
