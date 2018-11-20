<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use \Dimsav\Translatable\Translatable;
    
    public $translatedAttributes = ['title'];
    
    protected  $table = 'genders';
    
    protected $fillable = [
        'serial_no'
        ];
}
