<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 
        'body', 
        'cover_image', 
        'pinned', 
        'user_id'
    ];

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
