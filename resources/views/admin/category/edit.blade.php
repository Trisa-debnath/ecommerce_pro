@extends('admin.dashboard')

@section('title', 'Edit Category')

@section('admin_layout')
<div class="container-fluid mt-4">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">Edit Category</h4>
        <a href="{{ route('admin.category.manage') }}" class="btn btn-secondary btn-sm">
            ← Back
        </a>
    </div>

    <!-- Centered Card -->
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">

            <div class="card shadow-sm border-0">

                <!-- Card Header -->
                <div class="card-header bg-warning text-dark fw-bold">
                    Update Category
                </div>

                <!-- Card Body -->
                <div class="card-body">

                    {{-- Validation Errors --}}
                    @if ($errors->any())
                        <div class="alert alert-danger mb-4">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Edit Form --}}
                    <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                        @csrf

                        <!-- Category Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Category Name</label>
                            <input type="text"
                                   name="name"
                                   id="name"
                                   class="form-control"
                                   value="{{ old('name', $category->name) }}"
                                   placeholder="Enter category name"
                                   required>
                        </div>

                        
                        <!-- Status -->
                        <div  
                        class="mb-3">
                            <label for="status" class="form-label fw-semibold">Status</label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-success">Update Category</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection
