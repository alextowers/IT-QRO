<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuotationDetail extends Model
{
    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function quotation()
    {
        return $this->belongsTo('App\Quotation');
    }
}
