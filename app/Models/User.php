<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function post() {
        return $this->hasOne(Post::class, 'user_id');
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function roles() {


        return $this->belongsToMany(Role::class)->withPivot('created_at','updated_at');;

        // to customize tables name and columns follow the format below
        //return $this->belongsToMany(Role::class,'user_roles','user_id','role_id');
    }


    public function photos() {

        return $this->morphMany(Photo::class,'imageable');


    }
}
