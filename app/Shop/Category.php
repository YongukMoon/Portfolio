<?php

namespace App\Shop;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=[
        'name', 'en', 'ko',
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
