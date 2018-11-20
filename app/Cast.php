<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    use \Dimsav\Translatable\Translatable;
    
    public $translatedAttributes = ['title'];
    
    protected  $table = 'casts';
    
    protected $fillable = [
        'serial_no'
        ];
}
