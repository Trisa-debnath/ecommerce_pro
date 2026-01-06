<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
    $categories = Category::latest()->paginate(10);
    return view('admin.category.manage', compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $request->validate([
        'name' => 'required|string|max:255',
    ]);

    Category::create([
        'name' => $request->name,
        'status' => $request->status ?? 1
    ]);

    return redirect()->route('admin.category.create')->with('success', 'Category created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
         $category = Category::findOrFail($id);
       return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
         
      
$category->update([
    'name' => $request->name,
    'status' => $request->status,
]);

        return redirect()->route('admin.category.index')
            ->with('success', 'Category updated successfully');
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()
            ->with('success', 'Category deleted successfully');
  
    }
}
