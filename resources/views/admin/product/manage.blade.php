@extends('admin.dashboard')
@section('title', 'manage product')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Product Inventory</h2>
        <a href="{{ route('admin.product.create') }}" class="btn btn-primary">Add New Product</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover border">
            <thead class="bg-light">
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>
                        @if($product->image)
                            <img src="{{ asset('uploads/products/'.$product->image) }}" width="50" class="rounded border">
                        @else
                            <img src="{{ asset('uploads/no-image.png') }}" width="50">
                        @endif
                    </td>
                    <td>
                        <strong>{{ $product->name }}</strong><br>
                        <small class="text-muted">{{ $product->slug }}</small>
                    </td>
                    <td>{{ $product->category->name ?? 'N/A' }}</td>
                    <td>${{ number_of_format($product->price, 2) }}</td>
                    <td><span class="badge bg-info text-dark">{{ $product->discount_percent }}% OFF</span></td>
                    <td>{{ $product->quantity }}</td>
                    <td>
                        <span class="badge {{ $product->status == 1 ? 'bg-success' : 'bg-danger' }}">
                            {{ $product->status == 1 ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-sm btn-outline-info">Edit</a>
                            <form action="{{ route('admin.product.delete', $product->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this product?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $products->links() }}
</div>
@endsection
