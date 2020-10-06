<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Comment extends Model
{
    protected $fillable = ['user_id','commentable_id','commentable_type','comment','parent_id'];

    public function commentable(){
        return $this->morphTo();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function replies(){
        return $this->belongsTo($this, 'parent_id');
    }
}
