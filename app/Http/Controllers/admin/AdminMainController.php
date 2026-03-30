<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class AdminMainController extends Controller
{
   public function index()
{

    $categories = \App\Models\Category::count();
    $subcategories = \App\Models\SubCategory::count();
    $orders = \App\Models\Order::count();
    $totalTestimonials = \App\Models\Testimonial::count();
    $totalProducts = \App\Models\Product::count();


    $recentTestimonials = \App\Models\Testimonial::latest()->take(10)->get();

    return view('admin.home', compact('totalProducts',
    'categories',
        'subcategories',
        'orders',
        'totalTestimonials',
        'recentTestimonials' ));
}


}
