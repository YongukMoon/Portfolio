<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=[
        'user_id', 'parent_id', 'commentable_type', 'commentable_id', 'content',
    ];

    protected $with=[
        'user',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function replies(){
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function parent(){
        return $this->belongTo(Comment::class, 'parent_id', 'id');
    }

    public function commentable(){
        return $this->morphTo();
    }
}
