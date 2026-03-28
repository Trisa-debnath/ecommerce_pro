<?php

use Livewire\Volt\Component;
use App\Models\Product;
use App\Models\Category;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

new #[Layout('components.home.shop_layout')]
class extends Component {
    use WithPagination;

    public $search = '';
    public $category_id = '';

    public function updatingSearch() { $this->resetPage(); }
    public function updatingCategoryId() { $this->resetPage(); }

    public function with(): array {
        $query = Product::latest();
        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        if ($this->category_id) {
            $query->where('category_id', $this->category_id);
        }

        return [
            'products' => $query->latest()->paginate(12),
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
            'title' => 'Added to Cart!',
            'text'  => $product->name . ' has been added successfully.',
            'icon'  => 'success'
        ]);

        $this->dispatch('cartUpdated');
    }
}; ?>

<div>
    {{-- Inner Page Banner --}}
    <section class="inner_page_head" style="background: #f7444e; color: white;
    padding:8px 0; text-align: center;">
        <div class="container">
            <h5>#NewArrivals</h5>
            <p>Check out our latest collection of electronic gadgets!</p>
        </div>
    </section>

    <section id="new_arrivals_page" class="product_section layout_padding">
        <div class="container">

            {{-- Search and Filter Bar --}}
            <div class="row mb-4 py-2 shadow-sm bg-light rounded align-items-center mx-0 border">
                <div class="col-md-5 mb-2 mb-md-0">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white border-right-0">
                                <i class="fa fa-search text-muted"></i></span>
                        </div>
                        <input type="text" wire:model.live="search" class="form-control border-left-0" placeholder="Search new products...">
                    </div>
                </div>
                <div class="col-md-4 mb-2 mb-md-0">
                    <select wire:model.live="category_id" class="form-control">
                        <option value="">All Categories</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 text-md-right text-center">
                    <span class="badge badge-danger p-2 px-3">Latest: {{ $products->total() }} Items</span>
                </div>
            </div>

            {{-- Product Grid --}}
            <div class="row">
                @forelse($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-4 mb-4">
                    <div class="box h-100 shadow-sm">
                        <div class="option_container">
                            <div class="options">
                                <a href="{{ route('product.details', $product->id) }}" class="option1">
                                    <i class="fa fa-eye"></i> Details
                                </a>
                                <a href="javascript:void(0)" wire:click.prevent="addToCart({{ $product->id }})" class="option2">
                                    <i class="fa fa-shopping-cart"></i> Add to Cart
                                </a>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="{{ asset('uploads/products/' . $product->image) }}" onerror="this.src='https://via.placeholder.com/200'" alt="{{ $product->name }}">
                        </div>
                        <div class="detail-box">
                            <h5>{{ $product->name }}</h5>

                            @if($product->discount_percent > 0)
                                <h6 class="text-danger">
                                    ৳{{ number_format($product->discount_price) }}
                                    <br>
                                    <small style="text-decoration: line-through; color: #999;">৳{{ number_format($product->price) }}</small>
                                    <span class="badge badge-success ml-1" style="font-size: 10px;">{{ $product->discount_percent }}% OFF</span>
                                </h6>
                            @else
                                <h6 class="text-primary">৳{{ number_format($product->price) }}</h6>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <img src="https://cdn-icons-png.flaticon.com/512/6134/6134065.png" width="80" alt="No Product">
                    <h4 class="mt-3 text-muted">No new arrivals found matching "{{ $search }}"</h4>
                </div>
                @endforelse
            </div>

            {{-- Pagination Links --}}
            <div class="d-flex justify-content-center mt-4 custom-pagination">
                {{ $products->links() }}
            </div>

        </div>
    </section>
</div>

<style>
    .custom-pagination svg { width: 20px; }
    .custom-pagination nav div:first-child { display: none; }

    .product_section .box {
        transition: all 0.3s ease;
        border-radius: 12px;
        overflow: hidden;
        background: #fff;
        border: 1px solid #eee;
    }
    .product_section .box:hover {
        box-shadow: 0 12px 25px rgba(0,0,0,0.1);
        border-color: #f7444e;
    }
    .inner_page_head h3 {
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
</style>
