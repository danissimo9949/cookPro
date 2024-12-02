<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content',
        'post_id',
        'parent_id',
    ];

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function parent(){
        return $this->belongsTo(Comment::class, 'parent_id');
    }
}
