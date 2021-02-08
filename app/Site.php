<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $table = 'sites';

    public function get_unit()
    {
        return $this->hasOne('App\Bill', 'site_id', 'id');
    }
}