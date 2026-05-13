@extends('admin.dashboard')

@section('title', 'Admin Dashboard')

@section('admin_layout')
@php
    $orderBadge = function ($status) {
        return match ($status) {
            'delivered', 'completed' => 'badge-success',
            'processing', 'confirmed' => 'badge-primary',
            'cancelled', 'canceled' => 'badge-danger',
            default => 'badge-warning',
        };
    };

    $paymentBadge = function ($status) {
        return $status === 'paid' ? 'badge-success' : 'badge-warning';
    };
@endphp

<style>
    .admin-dashboard {
        background: #f5f7fb;
        min-height: calc(100vh - 120px);
        padding: 24px;
    }

    .dashboard-hero {
        background: linear-gradient(135deg, #16213e 0%, #24406f 55%, #0f766e 100%);
        border-radius: 8px;
        color: #fff;
        padding: 28px;
        margin-bottom: 22px;
        box-shadow: 0 14px 30px rgba(22, 33, 62, 0.18);
    }

    .dashboard-hero h2 {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 6px;
    }

    .dashboard-hero p {
        color: rgba(255, 255, 255, 0.78);
        margin-bottom: 0;
    }

    .metric-card {
        background: #fff;
        border: 1px solid #e8edf5;
        border-radius: 8px;
        padding: 18px;
        min-height: 132px;
        box-shadow: 0 8px 20px rgba(15, 23, 42, 0.05);
        margin-bottom: 18px;
    }

    .metric-card .metric-icon {
        width: 46px;
        height: 46px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 20px;
        margin-bottom: 14px;
    }

    .metric-card .label {
        color: #68758d;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: .04em;
        font-weight: 700;
        display: block;
        margin-bottom: 6px;
    }

    .metric-card h3 {
        color: #172033;
        font-size: 26px;
        margin: 0;
        font-weight: 700;
    }

    .metric-card small {
        color: #7a8699;
        display: block;
        margin-top: 8px;
    }

    .bg-products { background: #2563eb; }
    .bg-orders { background: #f97316; }
    .bg-revenue { background: #059669; }
    .bg-customers { background: #7c3aed; }
    .bg-warning-soft { background: #fff7ed; color: #c2410c; }
    .bg-success-soft { background: #ecfdf5; color: #047857; }
    .bg-info-soft { background: #eff6ff; color: #1d4ed8; }

    .dashboard-panel {
        background: #fff;
        border: 1px solid #e8edf5;
        border-radius: 8px;
        box-shadow: 0 8px 20px rgba(15, 23, 42, 0.05);
        margin-bottom: 20px;
    }

    .dashboard-panel .panel-header {
        padding: 16px 18px;
        border-bottom: 1px solid #edf1f7;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .dashboard-panel .panel-header h5 {
        margin: 0;
        color: #172033;
        font-size: 16px;
        font-weight: 700;
    }

    .dashboard-panel .panel-body {
        padding: 18px;
    }

    .table-dashboard th {
        color: #68758d;
        border-top: 0;
        font-size: 12px;
        text-transform: uppercase;
    }

    .table-dashboard td {
        vertical-align: middle;
    }

    .product-thumb {
        width: 42px;
        height: 42px;
        border-radius: 8px;
        object-fit: cover;
        background: #edf1f7;
        border: 1px solid #e3e9f2;
    }

    .quick-action {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 14px 16px;
        border: 1px solid #e8edf5;
        border-radius: 8px;
        color: #172033;
        margin-bottom: 10px;
        background: #fff;
        transition: all .2s ease;
    }

    .quick-action:hover {
        color: #2563eb;
        border-color: #bfdbfe;
        box-shadow: 0 8px 18px rgba(37, 99, 235, .08);
        text-decoration: none;
    }

    .progress.slim {
        height: 6px;
        border-radius: 999px;
        background: #edf1f7;
    }

    @media (max-width: 767px) {
        .admin-dashboard {
            padding: 14px;
        }

        .dashboard-hero {
            padding: 20px;
        }

        .dashboard-hero h2 {
            font-size: 22px;
        }
    }
</style>

<div class="admin-dashboard">
    <div class="dashboard-hero">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h2>Ecommerce Pro Dashboard</h2>
                <p>Manage products, orders, inventory, categories, customers, and testimonials from one smart overview.</p>
            </div>
            <div class="col-lg-4 text-lg-right mt-3 mt-lg-0">
                <a href="{{ route('home.index') }}" class="btn btn-light btn-sm" target="_blank">
                    <i class="ti-eye mr-1"></i> View Store
                </a>
                <a href="{{ route('admin.product.create') }}" class="btn btn-warning btn-sm ml-2">
                    <i class="ti-plus mr-1"></i> Add Product
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="metric-card">
                <span class="metric-icon bg-products"><i class="ti-package"></i></span>
                <span class="label">Products</span>
                <h3>{{ number_format($totalProducts) }}</h3>
                <small>{{ number_format($activeProducts) }} active, {{ number_format($lowStockProducts) }} low stock</small>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="metric-card">
                <span class="metric-icon bg-orders"><i class="ti-shopping-cart"></i></span>
                <span class="label">Orders</span>
                <h3>{{ number_format($orders) }}</h3>
                <small>{{ number_format($pendingOrders) }} pending, {{ number_format($deliveredOrders) }} delivered</small>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="metric-card">
                <span class="metric-icon bg-revenue"><i class="ti-money"></i></span>
                <span class="label">Total Revenue</span>
                <h3>BDT {{ number_format($totalRevenue, 2) }}</h3>
                <small>Today: BDT {{ number_format($todayRevenue, 2) }}</small>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="metric-card">
                <span class="metric-icon bg-customers"><i class="ti-user"></i></span>
                <span class="label">Customers</span>
                <h3>{{ number_format($totalCustomers) }}</h3>
                <small>{{ number_format($totalAdmins) }} admin, {{ number_format($totalTestimonials) }} testimonials</small>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-8">
            <div class="dashboard-panel">
                <div class="panel-header">
                    <h5>Recent Orders</h5>
                    <a href="{{ route('admin.orders') }}" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-dashboard">
                            <thead>
                                <tr>
                                    <th>Order</th>
                                    <th>Customer</th>
                                    <th>Payment</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentOrders as $order)
                                    <tr>
                                        <td>
                                            <a href="{{ route('admin.orders.show', $order->id) }}" class="font-weight-bold">
                                                {{ $order->order_number }}
                                            </a>
                                        </td>
                                        <td>
                                            {{ $order->name }}<br>
                                            <small class="text-muted">{{ $order->phone }}</small>
                                        </td>
                                        <td>
                                            <span class="badge {{ $paymentBadge($order->payment_status ?? 'pending') }}">
                                                {{ strtoupper($order->payment_status ?? 'pending') }}
                                            </span>
                                            <br><small>{{ strtoupper($order->payment_method ?? 'cod') }}</small>
                                        </td>
                                        <td>
                                            <span class="badge {{ $orderBadge($order->order_status ?? 'pending') }}">
                                                {{ strtoupper($order->order_status ?? 'pending') }}
                                            </span>
                                        </td>
                                        <td>BDT {{ number_format($order->total_amount, 2) }}</td>
                                        <td>{{ $order->created_at->format('d M, Y') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-4">No orders found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="dashboard-panel">
                <div class="panel-header">
                    <h5>Latest Products</h5>
                    <a href="{{ route('admin.product.manage') }}" class="btn btn-sm btn-outline-primary">Manage Products</a>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-dashboard">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Stock</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentProducts as $product)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @if($product->image)
                                                    <img src="{{ asset('uploads/products/'.$product->image) }}" class="product-thumb mr-3" alt="{{ $product->name }}">
                                                @else
                                                    <span class="product-thumb mr-3 d-inline-flex align-items-center justify-content-center">
                                                        <i class="ti-image text-muted"></i>
                                                    </span>
                                                @endif
                                                <div>
                                                    <strong>{{ $product->name }}</strong><br>
                                                    <small class="text-muted">{{ $product->subcategory->name ?? 'No subcategory' }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $product->category->name ?? 'N/A' }}</td>
                                        <td>BDT {{ number_format($product->price, 2) }}</td>
                                        <td>{{ number_format($product->discount_percent ?? 0) }}%</td>
                                        <td>
                                            <span class="badge {{ $product->quantity <= 5 ? 'badge-danger' : 'badge-success' }}">
                                                {{ $product->quantity }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge {{ $product->status ? 'badge-success' : 'badge-secondary' }}">
                                                {{ $product->status ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-4">No products found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="dashboard-panel">
                <div class="panel-header">
                    <h5>Store Summary</h5>
                </div>
                <div class="panel-body">
                    <div class="row text-center">
                        <div class="col-6 mb-3">
                            <div class="p-3 bg-info-soft rounded">
                                <strong>{{ number_format($totalCategories) }}</strong>
                                <small class="d-block">Categories</small>
                                <small>{{ number_format($activeCategories) }} active</small>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="p-3 bg-success-soft rounded">
                                <strong>{{ number_format($totalSubcategories) }}</strong>
                                <small class="d-block">Subcategories</small>
                                <small>{{ number_format($activeSubcategories) }} active</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 bg-warning-soft rounded">
                                <strong>{{ number_format($pendingOrders) }}</strong>
                                <small class="d-block">Pending Orders</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 bg-warning-soft rounded">
                                <strong>{{ number_format($outOfStockProducts) }}</strong>
                                <small class="d-block">Out of Stock</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dashboard-panel">
                <div class="panel-header">
                    <h5>Quick Actions</h5>
                </div>
                <div class="panel-body">
                    <a href="{{ route('admin.product.create') }}" class="quick-action">
                        <span><i class="ti-plus mr-2"></i>Add Product</span>
                        <i class="ti-angle-right"></i>
                    </a>
                    <a href="{{ route('admin.category.create') }}" class="quick-action">
                        <span><i class="ti-folder mr-2"></i>Add Category</span>
                        <i class="ti-angle-right"></i>
                    </a>
                    <a href="{{ route('admin.subcategory.create') }}" class="quick-action">
                        <span><i class="ti-layers mr-2"></i>Add Subcategory</span>
                        <i class="ti-angle-right"></i>
                    </a>
                    <a href="{{ route('admin.orders') }}" class="quick-action">
                        <span><i class="ti-receipt mr-2"></i>Manage Orders</span>
                        <i class="ti-angle-right"></i>
                    </a>
                    <a href="{{ route('testimonials.create') }}" class="quick-action">
                        <span><i class="ti-comment-alt mr-2"></i>Add Testimonial</span>
                        <i class="ti-angle-right"></i>
                    </a>
                </div>
            </div>

            <div class="dashboard-panel">
                <div class="panel-header">
                    <h5>Low Stock Alert</h5>
                </div>
                <div class="panel-body">
                    @forelse($lowStockItems as $item)
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <strong>{{ $item->name }}</strong><br>
                                <small class="text-muted">{{ $item->category->name ?? 'N/A' }}</small>
                            </div>
                            <span class="badge badge-danger">{{ $item->quantity }} left</span>
                        </div>
                    @empty
                        <p class="text-muted mb-0">Inventory looks healthy. No low stock products.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-7">
            <div class="dashboard-panel">
                <div class="panel-header">
                    <h5>Category Overview</h5>
                    <a href="{{ route('admin.category.manage') }}" class="btn btn-sm btn-outline-primary">Manage</a>
                </div>
                <div class="panel-body">
                    @forelse($categoryStats as $category)
                        @php
                            $productPercent = $totalProducts > 0 ? min(100, round(($category->products_count / $totalProducts) * 100)) : 0;
                        @endphp
                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <strong>{{ $category->name }}</strong>
                                <small>{{ $category->products_count }} products, {{ $category->subcategories_count }} subcategories</small>
                            </div>
                            <div class="progress slim mt-2">
                                <div class="progress-bar bg-info" style="width: {{ $productPercent }}%"></div>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted mb-0">No categories found.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="col-xl-5">
            <div class="dashboard-panel">
                <div class="panel-header">
                    <h5>Recent Testimonials</h5>
                    <a href="{{ route('testimonials.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                <div class="panel-body">
                    @forelse($recentTestimonials as $testimonial)
                        <div class="mb-3 pb-3 border-bottom">
                            <div class="d-flex justify-content-between">
                                <strong>{{ $testimonial->name }}</strong>
                                <span class="text-warning">
                                    @for($i = 0; $i < (int) $testimonial->rating; $i++)
                                        <i class="ti-star"></i>
                                    @endfor
                                </span>
                            </div>
                            <small class="text-muted">{{ $testimonial->designation }}</small>
                            <p class="mb-0 mt-2 text-muted">{{ \Illuminate\Support\Str::limit($testimonial->comment, 90) }}</p>
                        </div>
                    @empty
                        <p class="text-muted mb-0">No testimonials found.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
