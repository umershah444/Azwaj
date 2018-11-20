<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complexion extends Model
{
    use \Dimsav\Translatable\Translatable;
    
    public $translatedAttributes = ['title'];
    
    protected  $table = 'complexions';
    
    protected $fillable = [
        'serial_no'
        ];
}
