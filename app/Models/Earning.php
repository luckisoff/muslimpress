<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Earning extends Model
{
    protected $fillable = ['user_id','earneable_id','earneable_type','amount','type'];

    public function earneable(){
        return $this->morphTo();
    }
}
