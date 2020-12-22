<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = "bills";

    public function name()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
