<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
  public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

  public function create()
    {
        return view('admin.testimonials.create');
    }
   // for Data database save
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'comment' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            // Apnar Volt file-er path onujayi 'public/home/images' e save hobe
            $request->image->move(public_path('home/images'), $imageName);
        }

        Testimonial::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'comment' => $request->comment,
            'rating' => $request->rating,
            'image' => $imageName,
        ]);

        return redirect()->route('atestimonials.index')->with('success', 'Testimonial added!');
    }
    // Delete
    public function destroy(Testimonial $testimonial) {
        if ($testimonial->image) {
            File::delete(public_path('home/images/'.$testimonial->image));
        }
        $testimonial->delete();
        return back()->with('success', 'Deleted successfully!');
    }
}
