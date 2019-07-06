<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public $timestamps=false;

    protected $fillable=[
        'user_id', 'comment_id', 'up', 'down',
    ];

    protected $dates=[
        'voted_at',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comment(){
        return $this->belongsTo(Comment::class);
    }

    public function setUpAttribute($value){
        $this->attributes['up']=$value ? 1:null;
    }

    public function setDownAttribute($value){
        $this->attributes['down']=$value ? 1:null;
    }
}
