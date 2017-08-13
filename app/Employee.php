<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function branch()
    {
        return $this->belongsTo('App\Branch');
    }

    public function position()
    {
        return $this->belongsTo('App\Position');
    }

    public function sales()
    {
        return $this->hasMany('App\Sale');
    }

    public function purchases()
    {
        return $this->hasMany('App\Purchase');
    }

    public function quotations()
    {
        return $this->hasMany('App\Quotation');
    }
}
