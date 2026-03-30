@extends('admin.dashboard')

@section('title', 'Admin Dashboard')

@section('admin_layout')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 fw-bold">Dashboard Overview</h1>
    </div>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-start border-primary border-4 shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Products</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalProducts }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-start border-success border-4 shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Category</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $categories }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-start border-info border-4 shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Sub-Category</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $subcategories }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-sitemap fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-start border-warning border-4 shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Orders</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $orders }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-start border-secondary border-4 shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Total Testimonials</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalTestimonials }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <div class="row mt-4">
        <div class="col-lg-8 mb-4">
            <div class="card shadow border-0">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Recently Added Testimonials</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Customer</th>
                                    <th>Rating</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentTestimonials as $rt)
                                <tr>
                                    <td>{{ $rt->name }}</td>
                                    <td>
                                        @for($i=0; $i<$rt->rating; $i++)
                                            <i class="fas fa-star text-warning small"></i>
                                        @endfor
                                    </td>
                                    <td>{{ $rt->created_at->format('d M, Y') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center">No recent testimonials found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{ route('testimonials.index') }}" class="btn btn-sm btn-link text-decoration-none">View All Testimonials</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white py-3">
                    <h6 class="m-0 font-weight-bold">Quick Actions</h6>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <a href="{{ route('testimonials.create') }}" class="list-group-item list-group-item-action py-3 border-0 border-bottom">
                            <i class="fas fa-plus-circle text-primary me-2"></i> Add New Testimonial
                        </a>
                        <a href="#" class="list-group-item list-group-item-action py-3 border-0 border-bottom">
                            <i class="fas fa-plus-square text-success me-2"></i> Add New Product
                        </a>
                        <a href="#" class="list-group-item list-group-item-action py-3 border-0 border-bottom">
                            <i class="fas fa-cog text-secondary me-2"></i> Site Settings
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
