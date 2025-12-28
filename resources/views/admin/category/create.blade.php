@extends('admin.dashboard')

@section('title', 'Create Category')

@section('admin_layout')
<div class="row justify-content-center" style="margin-top: 30px; padding:50px;">
    <div class="col-md-6" style=" padding:10px;">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white text-center fs-5 fw-bold">
                Create New Category
            </div>
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.category.store') }}" method="POST">
                    @csrf

                    <!-- Category Name -->
                    <div class="form-group mb-4">
                        <label for="name" class="form-label fw-bold">Category Name</label>
                        <input type="text" name="name" 
                               class="form-control border border-primary rounded py-2 px-3"
                               id="name" placeholder="Enter category name" required>
                    </div>

                    <!-- Status -->
                    <div class="form-group mb-4">
                        <label for="status" class="form-label fw-bold">Status</label>
                        <select name="status" 
                                class="form-control border border-success rounded py-2 px-3" 
                                id="status">
                            <option value="1" selected>Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-success w-100 py-2">Create Category</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
