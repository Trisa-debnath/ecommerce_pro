<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $fillable = [
        'category_id',
        'subcategory_id',
        'name',
        'slug',
        'price',
        'discount_persent',
        'quantity',
        'description',
        'image',
        'status'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }


}
