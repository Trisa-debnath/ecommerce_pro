<?php

use Livewire\Volt\Component;
use App\Models\Product;
use Livewire\Attributes\Layout;

#[Layout('home.shop_layout')]
new class extends Component {
    public Product $product;

    public function mount($id)
    {
        // Eager loading category for better performance
        $this->product = Product::with('category')->findOrFail($id);
    }

    public function addToCart($productId)
    {
        // Future Cart Logic goes here
        session()->flash('success', 'Product added to cart!');
    }
}; ?>

<div class="py-5 bg-light">
    <div class="container">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="p-3 border rounded shadow-sm bg-white text-center">
                    @if($product->image)
                        <img src="{{ asset('uploads/products/' . $product->image) }}"
                             class="img-fluid rounded"
                             style="max-height: 500px; object-fit: contain;"
                             alt="{{ $product->name }}">
                    @else
                        <img src="{{ asset('home/images/no-image.png') }}" class="img-fluid" alt="No Image">
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <div class="product-info-grid p-4 bg-white border rounded shadow-sm">
                    <h2 class="font-weight-bold text-dark">{{ $product->name }}</h2>
                    <p class="text-muted">
                        Category: <span class="badge badge-info">{{ $product->category->name ?? 'N/A' }}</span>
                    </p>

                    <hr>

                    <div class="price-section my-4">
                        @if($product->discount_percent > 0)
                            <h3 class="text-danger mb-0 font-weight-bold">
                                ৳{{ number_format($product->discount_price) }}
                            </h3>
                            <p class="text-muted">
                                <del>৳{{ number_format($product->price) }}</del>
                                <span class="text-success ml-2 font-weight-bold">{{ $product->discount_percent }}% Off</span>
                            </p>
                        @else
                            <h3 class="text-primary font-weight-bold">৳{{ number_format($product->price) }}</h3>
                        @endif
                    </div>

                    <div class="description-box mb-4">
                        <h5 class="font-weight-bold">Description:</h5>
                        <p class="text-secondary" style="line-height: 1.6;">
                            {{ $product->description ?? 'No description available for this product.' }}
                        </p>
                    </div>

                    <hr>

                    <div class="action-buttons d-flex mt-4">
                        <button wire:click="addToCart({{ $product->id }})" class="btn btn-danger btn-lg px-5 mr-3 shadow-sm">
                            <i class="fa fa-shopping-cart mr-2"></i> Add to Cart
                        </button>
                        <button class="btn btn-outline-dark btn-lg px-4 shadow-sm">
                            <i class="fa fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
