<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function likers(){
        return $this->belongsToMany(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
