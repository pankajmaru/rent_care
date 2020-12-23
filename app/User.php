<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = ['name','email','password'];

    public function get_room(){

        return $this->belongsTo('App\Room','room_id','room_id');
    }
}