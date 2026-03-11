<?php

use Livewire\Volt\Component;
use App\Models\Product;
use Livewire\Attributes\Layout;

new #[Layout('home.shop_layout')]
class extends Component {

    public $product;
    public $quantity = 1;

    public function mount($id)
    {
        // Product load kora ebong sathe relations gulo ana
        $this->product = Product::with(['category', 'subcategory'])->findOrFail($id);
    }

    public function increment()
    {
        // Stock-er beshi jeno quantity na jay seta check kora
        if ($this->quantity < $this->product->quantity) {
            $this->quantity++;
        }
    }

    public function decrement()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function addToCart()
    {
        // Ekhane apnar cart logic thakbe
        // Udahoron: Cart::add($this->product->id, $this->product->name, $this->quantity, $this->product->discount_price);

        session()->flash('success', 'Product added to cart successfully!');
    }
}; ?>

<div class="py-12 bg-gray-50">
    <section class="product_section layout_padding">
    <div class="container">
        <div class="row bg-white p-4 shadow-sm rounded">

            <div class="col-md-6 d-flex align-items-center justify-center">
                <div class="img-box p-3 border rounded w-100 text-center bg-light">
                    <img src="{{ asset('uploads/products/' . $product->image) }}"
                         alt="{{ $product->name }}"
                         class="img-fluid"
                         style="max-height: 450px; object-fit: contain;">
                </div>
            </div>

            <div class="col-md-6">
                <div class="detail-box px-md-4">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent p-0 mb-2">
                            <li class="breadcrumb-item text-danger uppercase small font-weight-bold">{{ $product->category->name }}</li>
                            @if($product->subcategory)
                                <li class="breadcrumb-item small font-weight-bold">{{ $product->subcategory->name }}</li>
                            @endif
                        </ol>
                    </nav>

                    <h1 class="font-weight-bold mb-3" style="font-size: 2.5rem; color: #002c3e;">
                        {{ $product->name }}
                    </h1>

                    <div class="price_box mb-4">
                        @if($product->discount_percent > 0)
                            <h3 class="text-danger font-weight-bold mb-0">
                                ${{ number_format($product->discount_price, 2) }}
                                <small class="text-muted ml-2 font-weight-normal" style="text-decoration: line-through; font-size: 1.2rem;">
                                    ${{ number_format($product->price, 2) }}
                                </small>
                            </h3>
                            <span class="badge badge-danger px-2 py-1 mt-1">{{ $product->discount_percent }}% OFF</span>
                        @else
                            <h3 class="text-danger font-weight-bold mb-0">${{ number_format($product->price, 2) }}</h3>
                        @endif
                    </div>

                    <hr>

                    <div class="mb-4">
                        <h6 class="font-weight-bold text-uppercase">Description</h6>
                        <p class="text-muted" style="line-height: 1.7;">
                            {{ $product->description }}
                        </p>
                    </div>

                    <div class="mb-4">
                 @if($product->quantity > 0)
                <p class="text-success font-weight-bold"><i class="fa fa-check-circle">
                    </i> In Stock ({{ $product->quantity }} items left)</p>
            @else
            <p class="text-danger font-weight-bold"><i class="fa fa-times-circle">
                </i> Out of Stock</p>
            @endif
            </div>

                    <div class="d-flex flex-wrap align-items-center mb-4">
                        <div class="quantity_selector d-flex border rounded mr-3 mb-2" style="height: 48px;">
                            <button wire:click="decrement" class="btn btn-light px-3" style="border-radius: 0;">-</button>
                            <span class="px-4 d-flex align-items-center font-weight-bold bg-white">{{ $quantity }}</span>
                            <button wire:click="increment" class="btn btn-light px-3" style="border-radius: 0;">+</button>
                        </div>

                        <button wire:click="addToCart"
                                @if($product->quantity <= 0) disabled @endif
                                class="btn btn-danger px-5 mb-2"
                                style="height: 48px; border-radius: 25px; font-weight: bold; background-color: #f7444e;">
                            ADD TO CART
                        </button>
                    </div>

                    @if (session()->has('success'))
                        <div class="alert alert-success mt-3 shadow-sm border-0">
                            <i class="fa fa-check-circle mr-2"></i> {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</section></div>
