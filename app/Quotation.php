<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
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

    public function quotationDetails()
    {
        return $this->hasMany('App\QuotationDetail');
    }
}
