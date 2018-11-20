<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MartialStatus extends Model
{
    use \Dimsav\Translatable\Translatable;
    
    public $translatedAttributes = ['title'];
    
    protected  $table = 'martial_statuses';
    
    protected $fillable = [
        'serial_no'
        ];
}
