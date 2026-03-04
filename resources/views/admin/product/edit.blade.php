@extends('admin.dashboard')
@section('title', 'Create product')
@section('content')
<div class="container">
    <h2>Edit Product</h2>

<form action="{{ route('admin.product.update', $product->id) }}"
     method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label>Product Name</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
        </div>

        <div class="form-group mb-3">
            <label>Category</label>
            <select name="category_id" class="form-control" id="category_id">
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $cat->id == $product->category_id ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
    <label>Sub-Category</label>
    <select name="subcategory_id" class="form-control" id="subcategory_id">
        <option value="">Select Sub-Category</option>
        @foreach($subcategories as $sub)
            <option value="{{ $sub->id }}" {{ $sub->id == $product->subcategory_id ? 'selected' : '' }}>
                {{ $sub->name }}
            </option>
        @endforeach
    </select>
</div>


     <div class="row">
<div class="col-md-6 mb-3">
                    <label>Slug </label>
                    <input type="text" name="slug" class="form-control" placeholder="product-url-slug">
                </div>
                  </div>

                   <div class="row">
             <div class="row">
                <div class="col-md-4 mb-3">
                    <label>Price</label>
                    <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Discount (%)</label>
                    <input type="number" name="discount_percent" class="form-control" value="{{ $product->discount_percent }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Quantity</label>
                    <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}" required>
                </div>
            </div>

        <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control"
                 rows="4">{{ $product->description }}</textarea>
            </div>



        <div class="mb-3">
            <label>Current Image</label><br>
            <img src="{{ asset('uploads/products/'.$product->image) }}" width="100">
        </div>

        <div class="mb-3">
            <label>Update Image (Optional)</label>
            <input type="file" name="image" class="form-control">
        </div>

       <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>


        <button type="submit" class="btn btn-success">Update Product</button>
    </form>
</div>
@endsection
