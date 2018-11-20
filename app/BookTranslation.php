<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookTranslation extends Model
{
    protected $table = 'book_translations';
    protected $fillable = [
        'book_id','title', 'description','pdf' ,'locale'
        ];
}
