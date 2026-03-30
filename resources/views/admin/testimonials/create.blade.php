@extends('admin.dashboard')

@section('title', 'Create Testimonial')

@section('admin_layout')
<style>
    /* Custom Input Styling */
    .custom-form-card {
        background: #ffffff;
        padding: 30px; /* Bhetore margin/padding dewar jonno */
        border-radius: 15px;
        border: 1px solid #e0e0e0;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    .form-control {
        border-radius: 8px;
        padding: 12px 15px;
        border: 1px solid #d1d1d1;
        transition: all 0.3s ease-in-out;
    }

    /* Input field-e click (focus) korle outline color hobe */
    .form-control:focus {
        border-color: #4e73df; /* Apnar pochondo moto color (Blue) */
        box-shadow: 0 0 8px rgba(78, 115, 223, 0.25);
        outline: none;
    }

    .form-label {
        font-weight: 600;
        color: #444;
        margin-bottom: 8px;
        display: block;
    }

    .submit-btn {
        padding: 10px 30px;
        border-radius: 8px;
        font-weight: bold;
        transition: 0.3s;
    }
</style>

<div class="container py-7">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="custom-form-card">
                <div class="mb-4">
                    <h3 class="text-primary fw-bold">Add New Testimonial</h3>
                    <p class="text-muted">Fill up the form to add a new customer review.</p>
                </div>

                <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-7 mb-5">
                            <label class="form-label">Customer Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Ex: John Doe" value="{{ old('name') }}" required>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label">Designation</label>
                            <input type="text" name="designation" class="form-control" placeholder="Ex: Software Engineer" value="{{ old('designation') }}">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Review Comment</label>
                        <textarea name="comment" class="form-control" rows="4" placeholder="Type the customer's feedback..." required>{{ old('comment') }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Rating Star</label>
                            <select name="rating" class="form-control">
                                <option value="5">⭐⭐⭐⭐⭐ (5 Stars)</option>
                                <option value="4">⭐⭐⭐⭐ (4 Stars)</option>
                                <option value="3">⭐⭐⭐ (3 Stars)</option>
                                <option value="2">⭐⭐ (2 Stars)</option>
                                <option value="1">⭐ (1 Star)</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label">Customer Photo</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>

                    <div class="mt-4 border-top pt-4 d-flex justify-content-between align-items-center">
                        <a href="{{ route('testimonials.index') }}" class="text-decoration-none text-secondary fw-bold">
                            <i class="fa fa-arrow-left"></i> Back to List
                        </a>
                        <button type="submit" class="btn btn-primary submit-btn shadow-sm">
                            Save Testimonial
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
