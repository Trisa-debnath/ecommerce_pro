<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class SubCategoryController extends Controller
{
    public function index()
    {

        $subcategories = SubCategory::with('category')->latest()->paginate(10);

        return view('admin.subcategory.manage', compact('subcategories'));
    }

    public function create()
    {
        $categories = Category::where('status', 1)->get();

        return view('admin.subcategory.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
            'slug' => 'required|unique:sub_categories,slug',
        ]);
        SubCategory::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'status' => $request->status,
             'slug' => Str::slug($request->name),
        ]);

    return redirect()->route('admin.subcategory.manage')->with('success', 'Sub-Category Created!');
    }

    public function edit($id)
    {
        $categories = Category::where('status', 1)->get();
        $subcategory = SubCategory::findOrFail($id);

        return view('admin.subcategory.edit', compact('categories', 'subcategory'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|string|max:255',
            // 'unique:table,column,except_id'
        'slug' => 'required|unique:sub_categories,slug,' . $id,
        ]);

        $subcategory = SubCategory::findOrFail($id);
        $subcategory->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => $request->status,
        ]);

        return redirect()->route('admin.subcategory.manage')->with('success', 'Sub-Category Updated!');
    }

    public function destroy($id)
    {
        SubCategory::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Sub-Category Deleted!');
    }
}
