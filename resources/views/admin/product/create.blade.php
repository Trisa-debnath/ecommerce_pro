@extends('admin.dashboard')
@section('title', 'Create product')
@section('content')
<div class="container">
    <h2>Add New Product</h2>
    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
        <label>Product Name</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
         value="{{ old('name') }}"placeholder="Enter Product Name" required>
        </div>
        <div class="form-group mb-3">
            <label>Select Category</label>
            <select name="category_id" class="form-control" id="category_id" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Select Sub-Category</label>
            <select name="subcategory_id" class="form-control" id="subcategory_id">
                <option value="">Select Sub-Category First</option>
            </select>
        </div>
        <div class="row">
<div class="col-md-6 mb-3">
                    <label>Slug </label>
                    <input type="text" name="slug" class="form-control" placeholder="product-url-slug">
                </div>
                  </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Price</label>
                <input type="number" name="price" class="form-control" step="0.01" required>
            </div>

 <div class="col-md-4 mb-3">
                    <label>Discount Percent (%)</label>
                    <input type="number" name="discount_percent" class="form-control" value="0" min="0" max="100">
                </div>

            <div class="col-md-6 mb-3">
                <label>Quantity</label>
                <input type="number" name="quantity" class="form-control" required>
            </div>
        </div>

        <div class="form-group mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
            </div>
        <div class="form-group mb-3">
            <label>Product Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#category_id').on('change', function() {
            var categoryId = $(this).val();
            if (categoryId) {
                $.ajax({
                    url: '/admin/get-subcategories/' + categoryId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#subcategory_id').empty();
                        $('#subcategory_id').append('<option value="">Select Sub-Category</option>');
                        $.each(data, function(key, value) {
                            $('#subcategory_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('#subcategory_id').empty();
            }
        });
    });
</script>
@endsection

