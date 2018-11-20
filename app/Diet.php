<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diet extends Model
{
    use \Dimsav\Translatable\Translatable;
    
    public $translatedAttributes = ['title'];
    
    protected  $table = 'diets';
    
    protected $fillable = [
        'serial_no'
        ];
}
