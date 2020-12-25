<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = "invoice";

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function room()
    {
        return $this->belongsTo('App\Room','room_id','room_id');
    }
}
