<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;

    protected $table = "posts";
    protected $primaryKey = "id";
    protected $fillable = ['title','content'];

    public function user() {
       return $this->belongsTo(User::class);
    }


    public function photos() {
        return $this->morphMany(Photo::Class,'imageable');
    }


    public function tags() {
        return $this->morphToMany(Tag::class,'taggable');

    }
}
