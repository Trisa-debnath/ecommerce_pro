<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
   public function create()
{
    $categories = Category::where('status', 1)->get();
    return view('admin.product.create', compact('categories'));
}



//AJAX
public function getSubcategories($id)
{
    $subcategories = \App\Models\SubCategory::where('category_id', $id)->where('status', 1)->get();
    return response()->json($subcategories);
}






public function store(Request $request){
    $request->validate([
        'category_id'     => 'required|exists:categories,id',
        'subcategory_id' => 'nullable|exists:sub_categories,id',
        'name'            => 'required|string|max:255',
        'slug' => 'nullable|unique:products,slug',
        'price'           => 'required|numeric|min:0',
        'discount_percent'  => 'nullable|numeric|min:0',
        'quantity'        => 'required|integer|min:0',
        'description'     => 'required|string',
        'image'           => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'status'          => 'required|boolean',
    ]);

 $imageName = null;
    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads/products'), $imageName);
    }


Product::create([
        'category_id' => $request->category_id,
        'subcategory_id' => $request->subcategory_id,
        'name' => $request->name,
       'slug' => Str::slug($request->name),
        'price' => $request->price,
       'discount_percent' => $request->discount_percent,
        'quantity' => $request->quantity,
        'description' => $request->description,
        'image' => $imageName,
        'status' => $request->status ?? 1,
    ]);

    return redirect()->route('admin.product.manage')->with('success', 'Product added successfully');




}



}
