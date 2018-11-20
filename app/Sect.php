<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sect extends Model
{
    use \Dimsav\Translatable\Translatable;
    
    public $translatedAttributes = ['title'];
    
    protected  $table = 'sects';
    
    protected $fillable = [
        'serial_no'
        ];
}
