<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    public function employees()
    {
        return $this->hasMany('App\Employee');
    }

    public function clients()
    {
        return $this->hasMany('App\Client');
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
