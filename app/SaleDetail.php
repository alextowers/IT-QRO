<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function sale()
    {
        return $this->belongsTo('App\Sale');
    }
}
