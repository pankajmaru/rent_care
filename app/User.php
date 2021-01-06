<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = ['name','email','password'];

    public function get_room(){

        return $this->belongsTo('App\Room','room_id','room_id');
    }
    
    public function get_images()
    {
        return $this->hasMany('App\UserImage','user_id','id');
    }    
}
