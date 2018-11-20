<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disability extends Model
{
    use \Dimsav\Translatable\Translatable;
    
    public $translatedAttributes = ['title'];
    
    protected  $table = 'disabilities';
    
    protected $fillable = [
        'serial_no'
        ];
}
