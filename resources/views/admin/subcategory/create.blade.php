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
    <div class="form-group">
    <label>Slug</label>
    <input type="text" name="slug" id="slug" class="form-control" readonly>
</div>
    <button type="submit" class="btn btn-primary">Save Sub-Category</button>
</form>

<script>
    document.querySelector('input[name="name"]').addEventListener('keyup', function() {
        let text = this.value;
        text = text.toLowerCase().replace(/[^a-z0-9 -]/g, '').replace(/\s+/g, '-').replace(/-+/g, '-');
        document.getElementById('slug').value = text;
    });
</script>

@endsection
