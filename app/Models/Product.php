<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\SubCategory;

class Product extends Model
{
     protected $fillable = [
      'name',
     'category_id',
        'subcategory_id',

        'slug',
        'price',
        'discount_percent',
        'quantity',
        'description',
        'image',
        'status'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function subcategory() {
    return $this->belongsTo(SubCategory::class, 'subcategory_id');
}

}
