<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    protected $fillable = [
        'book_id','category_id'
        ];
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    
    public function book()
    {
        return $this->belongsTo('App\Book');
    }
}
