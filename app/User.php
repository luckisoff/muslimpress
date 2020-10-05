<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\WriterRequest;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'suspended','name', 'email', 'password', 'mobile_number', 'image', 'country', 'address', 'blood_group','role', 'remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role($role){
        return $this->role == $role;
    }

    public function setSlugAttribute($name){
        $this->attributes['slug'] = substr(\md5(time().$name),0,9);
    }

    public function writerRequest($status = null){
        if($status){
            return $this->hasOne(WriterRequest::class)->where('status', $status);
        }
        return $this->hasOne(WriterRequest::class);
    }

    public function earnings(){
        return $this->hasMany(Earning::class);
    }
}
