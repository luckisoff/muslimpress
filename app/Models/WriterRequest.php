<?php

namespace App\Models;

use App\User;
class WriterRequest extends MainModel
{
    protected $fillable = ['user_id', 'status','article','terms'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
