<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class News extends MainModel
{
    protected $fillable =['title','slug','image','summary','content','tags',
    'source','source_url','type','locale','user_id', 'references', 'status'];

    public function setSlugAttribute($title){
        $this->attributes['slug'] = $this->createSlug($title);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable')->where('parent_id', null);
    }

    public function likes(){
        return $this->morphMany(Like::class, 'likeable');
    }

    public function views(){
        return $this->morphMany(View::class, 'viewable');
    }

    public function earnings(){
        return $this->morphMany(Earning::class, 'earneable');
    }
}
