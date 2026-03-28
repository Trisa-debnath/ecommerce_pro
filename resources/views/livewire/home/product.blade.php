<?php

use Livewire\Volt\Component;
use App\Models\Product;
use App\Models\Category;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;

    public $search = '';
    public $category_id = '';

    // search or category if done update
    public function updatingSearch() { $this->resetPage(); }
    public function updatingCategoryId() { $this->resetPage(); }

    public function with(): array {
        $query = Product::query();

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        if ($this->category_id) {
            $query->where('category_id', $this->category_id);
        }

        return [
            'products' => $query->latest()->paginate(9),
            'categories' => Category::all(),
        ];
    }


public function addToCart($id)
{
    $product = Product::findOrFail($id);
    $cart = session()->get('cart', []);

    if(isset($cart[$id])) {
        $cart[$id]['quantity']++;
    } else {
        $cart[$id] = [
            "id" => $product->id,
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->discount_price ?? $product->price,
            "image" => $product->image
        ];
    }

    session()->put('cart', $cart);

    // SweetAlert
    $this->dispatch('swal:modal', [
        'type'  => 'success',
        'title' => 'Added Successfully!!',
        'text'  => $product->name . ' Product added to cart successfully!',
        'icon'  => 'success'
    ]);

    $this->dispatch('cartUpdated');
}

}; ?>

<div>
    <section id="our_products" class="product_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>Our <span>Products</span></h2>
            </div>

            <div class="row mb-5 py-3 shadow-sm bg-light rounded shadow-sm align-items-center">
                <div class="col-md-5 mb-2 mb-md-0">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-right-0"><i class="fa fa-search"></i></span>
                        <input type="text" wire:model.live="search" class="form-control border-left-0" placeholder="Search for Laptops, Accessories...">
                    </div>
                </div>
                <div class="col-md-4 mb-2 mb-md-0">
                    <select wire:model.live="category_id" class="form-control">
                        <option value="">All Categories / Brands</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 text-md-right text-center">
                   <span class="badge badge-info p-2 px-3">Showing {{ $products->count() }} Products</span>
                </div>
            </div>

            <div class="row">
                @forelse($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box h-100">
                        <div class="option_container">
                            <div class="options">
                                <a href="{{ route('product.details', $product->id) }}" class="option1">
                                    <i class="fa fa-eye"></i> Details
                                </a>
                     <a href="{{route('cart')}}" wire:click.prevent="addToCart({{ $product->id }})" class="option2">
                                    <i class="fa fa-shopping-cart"></i> Add to Cart
                                </a>
                                <a href="#" class="option1 mt-2 bg-danger text-white">
                                    <i class="fa fa-heart"></i> Wishlist
                                </a>
                            </div>
                        </div>
                        <div class="img-box">
<img src="{{ asset('uploads/products/' . $product->image) }}"
 alt="{{ $product->name }}">
                        </div>


<div class="detail-box">
    <h5>{{ $product->name }}</h5>

    @if($product->discount_percent > 0)
        <h6 style="color: red">
            ৳{{ number_format($product->discount_price) }}
            <br>
            <span style="text-decoration: line-through; color: blue; font-size: 14px;">
                ৳{{ number_format($product->price) }}
            </span>
            <span class="badge badge-success ml-1" style="font-size: 10px;">
                {{ $product->discount_percent }}% OFF
            </span>
        </h6>
    @else
        <h6 style="color: blue">৳{{ number_format($product->price) }}</h6>
    @endif
</div>


                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <img src="https://cdn-icons-png.flaticon.com/512/6134/6134065.png" width="100" alt="No Product">
                    <h4 class="mt-3 text-muted">No products found matching your search.
                    </h4>
                </div>
                @endforelse
            </div>

            <div class="d-flex justify-content-center mt-4 p-pagination">
                {{ $products->links() }}
            </div>

            <div class="btn-box">
                <a href="">View All Products</a>
            </div>
        </div>
    </section>
</div>

<style>

    .p-pagination svg { width: 20px; }
    .p-pagination nav div:first-child { display: none; }
    .product_section .box { transition: all 0.3s ease; border-radius: 10px; overflow: hidden; }
    .product_section .box:hover { box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
</style>
