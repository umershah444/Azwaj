<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuotationTranslation extends Model
{
    protected $table = 'quotation_translations';
    protected $fillable = [
        'quotation_id','title','reference', 'locale'
        ];
}
