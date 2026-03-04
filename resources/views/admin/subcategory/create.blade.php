@extends('admin.dashboard')

@section('title', 'Create Sub-category')

@section('admin_layout')
<form action="{{ route('admin.subcategory.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Select Category</label>
        <select name="category_id" class="form-control">
            <option value="">Choose Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Sub-Category Name</label>
        <input type="text" name="name" class="form-control" placeholder="Enter Name">
    </div>

    <div class="form-group">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Save Sub-Category</button>
</form>
@endsection
