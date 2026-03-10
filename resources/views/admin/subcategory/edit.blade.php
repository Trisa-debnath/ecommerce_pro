@extends('admin.dashboard')

@section('title', 'edi sub-Category')

@section('admin_layout')
<form action="{{ route('admin.subcategory.update', $subcategory->id) }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Select Category</label>
        <select name="category_id" class="form-control">
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ $cat->id == $subcategory->category_id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
    <label>Sub-Category Name</label>
    <input type="text" name="name" class="form-control" value="{{ $subcategory->name }}">
    </div>

    <div class="form-group">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="1" {{ $subcategory->status == 1 ? 'selected' : '' }}>Active</option>
            <option value="0" {{ $subcategory->status == 0 ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>

<div class="form-group">
        <label>Slug</label>
        <input type="text" name="slug" value="{{ $subcategory->slug }}" id="slug" class="form-control" readonly>
    </div>
    <button type="submit" class="btn btn-success">Update Sub-Category</button>
</form>

<script>
    document.querySelector('input[name="name"]').addEventListener('keyup', function() {
        let text = this.value;
        text = text.toLowerCase().replace(/[^a-z0-9 -]/g, '').replace(/\s+/g, '-').replace(/-+/g, '-');
        document.getElementById('slug').value = text;
    });
</script>

@endsection
