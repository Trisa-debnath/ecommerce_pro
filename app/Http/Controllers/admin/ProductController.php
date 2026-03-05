<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    // AJAX
    public function getSubcategories($id)
    {
        $subcategories = SubCategory::where('category_id', $id)->where('status', 1)->get();

        return response()->json($subcategories);
    }

    public function index()
    {
        $products = Product::with(['category', 'subcategory'])->latest()->paginate(10);

        return view('admin.product.manage', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('status', 1)->get();

        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'nullable|exists:sub_categories,id',
            'name' => 'required|string|max:255',
            'slug' => 'nullable|unique:products,slug',
            'price' => 'required|numeric|min:0',
            'discount_percent' => 'nullable|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|boolean',
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

        return redirect()->route('admin.product.manage')
            ->with('success', 'Product added successfully');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::where('status', 1)->get();
        $subcategories = SubCategory::where('category_id', $product->category_id)->get();

        return view('admin.product.edit', compact('product', 'categories', 'subcategories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'nullable|exists:sub_categories,id',
            'name' => 'required|string|max:255',
            'slug' => 'nullable|unique:products,slug,'.$id,
            'price' => 'required|numeric|min:0',
            'discount_percent' => 'nullable|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|boolean',

        ]);

        $imageName = $product->image; // old image

        if ($request->hasFile('image')) {
            // old image delete
            if ($product->image && file_exists(public_path('uploads/products/'.$product->image))) {
                unlink(public_path('uploads/products/'.$product->image));
            }
            // new image upload
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/products'), $imageName);
        }

        $product->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'name' => $request->name,
            'slug' => $request->slug ? \Illuminate\Support\Str::slug($request->slug)
             : \Illuminate\Support\Str::slug($request->name),
            'price' => $request->price,
            'discount_percent' => $request->discount_percent,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'image' => $imageName,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.product.manage')->with('success', 'Product Updated Successfully!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->image && File::exists(public_path('uploads/products/'.$product->image))) {
            File::delete(public_path('uploads/products/'.$product->image));
        }

        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully!');
    }
}
