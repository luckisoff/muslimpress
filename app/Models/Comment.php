<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id','commentable_id','commentable_type','comment','parent_id'];

    public function commentable(){
        return $this->morphTo();
    }

    public function user(){
        return $this->belongsTo(App\User::class);
    }

    public function replies(){
        return $this->belongsTo(Self::class, 'parent_id');
    }
}
