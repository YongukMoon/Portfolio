<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable=[
        'user_id', 'title', 'content', 'notification', 'view_count',
    ];

    protected $with=[
        'user',
        'tags',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function attachments(){
        return $this->hasMany(Attachment::class);
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function getCommentCountAttribute(){
        return (int) $this->comments->count();
    }
}
