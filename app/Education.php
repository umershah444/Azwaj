<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use \Dimsav\Translatable\Translatable;
    
    public $translatedAttributes = ['title'];
    
    protected  $table = 'education';
    
    protected $fillable = [
        'serial_no'
        ];
}
