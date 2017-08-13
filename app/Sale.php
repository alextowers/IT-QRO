<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    public function branch()
    {
        return $this->belongsTo('App\Branch');
    }

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function saleDetails()
    {
        return $this->hasMany('App\SaleDetail');
    }
}
