<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Category;

class SubCategory extends Model
{
    protected $fillable = ['category_id', 'name', 'slug', 'status'];

  
    public function category() {
        return $this->belongsTo(Category::class);
    }

   
    public function products() {
        return $this->hasMany(Product::class);
    }
}
