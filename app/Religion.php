<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    use \Dimsav\Translatable\Translatable;
    
    public $translatedAttributes = ['title'];
    
    protected  $table = 'religions';
    
    protected $fillable = [
        'serial_no'
        ];
}
