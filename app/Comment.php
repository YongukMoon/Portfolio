<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=[
        'user_id', 'parent_id', 'commentable_type', 'commentable_id', 'content',
    ];

    protected $with=[
        'user', 'votes',
    ];

    protected $appends=[
        'up_count', 'down_count',
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

    public function votes(){
        return $this->hasMany(Vote::class);
    }

    public function getUpCountAttribute(){
        return (int) $this->votes()->sum('up');
    }

    public function getDownCountAttribute(){
        return (int) $this->votes()->sum('down');
    }
}
