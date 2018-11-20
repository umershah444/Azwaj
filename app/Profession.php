<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    use \Dimsav\Translatable\Translatable;
    
    public $translatedAttributes = ['title'];
    
    protected  $table = 'professions';
    
    protected $fillable = [
        'serial_no'
        ];
}
