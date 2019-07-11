<?php

namespace App\Shop;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
        'title', 'category_id', 'price', 'stock',
    ];

    protected $with=[
        'category',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function productImgs(){
        return $this->hasMany(ProductImg::class);
    }
}
