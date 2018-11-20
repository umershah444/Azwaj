<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BodyType extends Model
{
    use \Dimsav\Translatable\Translatable;
    
    public $translatedAttributes = ['title'];
    
    protected  $table = 'body_types';
    
    protected $fillable = [
        'serial_no'
        ];
}
