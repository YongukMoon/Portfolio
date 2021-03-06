<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $fillable=[
        'article_id', 'filename', 'bytes', 'mime',
    ];

    public function getBytesAttribute($value){
        return format_filesize($value);
    }

    public function getUrlAttribute(){
        return url('files/'.$this->filename);
    }

    public function article(){
        return $this->belongsTo(Article::class);
    }
}
