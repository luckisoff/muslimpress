<?php

namespace App\Models;

use App\User;

class Category extends MainModel
{
    protected $fillable = ['name','en','hi','image','user_id'];


    public function admin(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function news(){
        return $this->belongsToMany(News::class)->where('type', 'news');
    }

    public function articles(){
        return $this->belongsToMany(News::class)->where('type', 'article');
    }

    public function newsArticles(){
        return $this->belongsToMany(News::class);
    }
}
