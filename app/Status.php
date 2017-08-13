<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
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
