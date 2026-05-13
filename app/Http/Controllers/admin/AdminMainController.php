<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Testimonial;
use App\Models\User;

class AdminMainController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $activeProducts = Product::where('status', 1)->count();
        $lowStockProducts = Product::where('quantity', '<=', 5)->count();
        $outOfStockProducts = Product::where('quantity', '<=', 0)->count();

        $totalCategories = Category::count();
        $activeCategories = Category::where('status', 1)->count();
        $totalSubcategories = SubCategory::count();
        $activeSubcategories = SubCategory::where('status', 1)->count();

        $orders = Order::count();
        $pendingOrders = Order::where('order_status', 'pending')->count();
        $deliveredOrders = Order::where('order_status', 'delivered')->count();
        $paidOrders = Order::where('payment_status', 'paid')->count();
        $totalRevenue = Order::sum('total_amount');
        $todayRevenue = Order::whereDate('created_at', today())->sum('total_amount');

        $totalTestimonials = Testimonial::count();
        $totalCustomers = User::where('usertype', 0)->count();
        $totalAdmins = User::where('usertype', 1)->count();

        $recentOrders = Order::latest()->take(6)->get();
        $recentProducts = Product::with(['category', 'subcategory'])->latest()->take(6)->get();
        $lowStockItems = Product::with('category')
            ->where('quantity', '<=', 5)
            ->orderBy('quantity')
            ->take(6)
            ->get();
        $recentTestimonials = Testimonial::latest()->take(5)->get();

        $categoryStats = Category::withCount(['subcategories'])
            ->withCount(['products'])
            ->latest()
            ->take(6)
            ->get();

        return view('admin.home', compact(
            'totalProducts',
            'activeProducts',
            'lowStockProducts',
            'outOfStockProducts',
            'totalCategories',
            'activeCategories',
            'totalSubcategories',
            'activeSubcategories',
            'orders',
            'pendingOrders',
            'deliveredOrders',
            'paidOrders',
            'totalRevenue',
            'todayRevenue',
            'totalTestimonials',
            'totalCustomers',
            'totalAdmins',
            'recentOrders',
            'recentProducts',
            'lowStockItems',
            'recentTestimonials',
            'categoryStats'
        ));
    }


}
