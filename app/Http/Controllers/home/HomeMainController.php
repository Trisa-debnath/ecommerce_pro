<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class HomeMainController extends Controller
{

public function index(Request $request)
{
$categories = Category::all();

$subcategories = Subcategory::has('products')
        ->with(['products' => function($q) {
            $q->whereNotNull('image')->latest();
        }])
        ->get();

        $new_arrivals = Product::latest()->take(10)->get();

        $query = Product::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->latest()->paginate(9);

        return view('home.user', compact('products', 'categories', 'subcategories', 'new_arrivals'));
    }


public function subcategoryProducts($id)
{

    $subcategory = Subcategory::with('products')->findOrFail($id);
    $products = $subcategory->products()->paginate(12);
    $categories = Category::all();

    return view('home.subcategory_view', compact('subcategory', 'products', 'categories'));
}

public function about() {

    return view('home.about');
}


}
