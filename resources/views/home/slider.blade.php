<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<style>
    .swiper { width: 100%; padding: 20px 0; position: relative; }

    /* Card Styling */
    .arrival-card {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        border: 1px solid #eee;
        transition: 0.3s;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .arrival-card:hover {
        border-color: #f7444e;
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }

    .arrival-card img {
        width: 100%;
        height: 160px;
        border-radius: 8px;
        object-fit: contain;
        margin-bottom: 15px;
        border: none;
    }

    /* Section Title */
    .section-title {
        font-weight: bold;
        margin-top: 40px;
        margin-bottom: 25px;
        color: #002c3e;
        border-left: 5px solid #f7444e;
        padding-left: 15px;
        text-transform: uppercase;
    }

    .section-title span { color: #f7444e; }

    /* Custom Navigation Colors */
    .swiper-button-next, .swiper-button-prev {
        color: #f7444e !important;
        transform: scale(0.7);
    }
</style>

<div class="container mt-5">

    {{-- Subcategories Section --}}
    @if($subcategories->count() > 0)
    <h2 class="section-title">Shop by <span>Subcategories</span></h2>
    <div  class="swiper categorySwiper">
        <div class="swiper-wrapper">
            @foreach($subcategories as $sub)
                @php
                    $firstProduct = $sub->products->first();
                    $displayImage = ($firstProduct && !empty($firstProduct->image))
                        ? asset('uploads/products/' . $firstProduct->image)
                        : asset('uploads/no-image.png');
                @endphp

                <div class="swiper-slide">
                    <a href="{{ route('home.index', ['subcategory_id' => $sub->id]) }}" style="text-decoration: none; color: inherit;">
                        <div class="arrival-card">
                            <img src="{{ $displayImage }}" onerror="this.src='https://via.placeholder.com/150?text=No+Image'" alt="{{ $sub->name }}">
                            <h6 class="font-weight-bold mb-1 text-truncate">{{ $sub->name }}</h6>
                            <div class="mt-auto">
                                <small class="badge badge-light border text-muted">{{ $sub->products->count() }} Items</small>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    @endif

    <hr class="my-5">

    {{-- New Arrivals Section --}}
    @if($new_arrivals->count() > 0)
    <h3 class="section-title">New <span>Arrivals</span></h3>
    <div class="swiper arrivalSwiper">
        <div class="swiper-wrapper">
            @foreach($new_arrivals as $new_p)
            <div class="swiper-slide">
                <div class="arrival-card">
                    <img src="{{ asset('uploads/products/'.$new_p->image) }}" onerror="this.src='https://via.placeholder.com/150'" alt="{{ $new_p->name }}">
                    <h6 class="text-truncate font-weight-bold">{{ $new_p->name }}</h6>
                    <p class="text-danger font-weight-bold mb-2">${{ number_format($new_p->discount_price ?? $new_p->price) }}</p>
                    <a href="{{ route('product.details', $new_p->id) }}" class="btn btn-sm btn-danger btn-block rounded-pill">View Details</a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    @endif

</div>

{{-- All Products Section --}}
<section class="product_section layout_padding mt-5">
    <div class="container">
        <div class="heading_container heading_center mb-4">
            <h2 class="section-title">Our <span>Products</span></h2>
        </div>

        {{-- Filter Form --}}
        <form action="{{ url()->current() }}" method="GET" class="row mb-5 py-3 shadow-sm bg-white rounded align-items-center border mx-0">
            <div class="col-md-5 mb-2 mb-md-0">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-white border-right-0"><i class="fa fa-search text-muted"></i></span>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control border-left-0" placeholder="Search products...">
                </div>
            </div>
            <div class="col-md-4 mb-2 mb-md-0">
                <select name="category_id" class="form-control" onchange="this.form.submit()">
                    <option value="">All Categories</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 text-md-right text-center">
                <button type="submit" class="btn btn-danger px-4">Filter Now</button>
            </div>
        </form>

        <div class="row">
            @forelse($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="arrival-card shadow-sm h-100">
                        <img src="{{ asset('uploads/products/' . $product->image) }}" class="img-fluid mb-3" onerror="this.src='https://via.placeholder.com/150'">
                        <h6 class="font-weight-bold text-truncate">{{ $product->name }}</h6>
                        <p class="text-danger font-weight-bold">${{ number_format($product->discount_price ?? $product->price) }}</p>
                        <a href="{{ route('product.details', $product->id) }}" class="btn btn-sm btn-outline-dark px-4 rounded-pill">Details</a>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <img src="https://via.placeholder.com/150?text=No+Products" class="mb-3">
                    <h4>No products found!</h4>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $products->appends(request()->query())->links() }}
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    // Category Slider
    var swiper1 = new Swiper(".categorySwiper", {
        slidesPerView: 2,
        spaceBetween: 25,
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
            pauseOnMouseEnter: true
        },
        navigation: {
            nextEl: ".categorySwiper .swiper-button-next",
            prevEl: ".categorySwiper .swiper-button-prev",
        },
        pagination: {
            el: ".categorySwiper .swiper-pagination",
            clickable: true
        },
        breakpoints: {
            640: { slidesPerView: 3 },
            768: { slidesPerView: 4 },
            1024: { slidesPerView: 5 },
        },
    });


    // New Arrivals Slider
    var swiper2 = new Swiper(".arrivalSwiper", {
        slidesPerView: 2,
        spaceBetween: 20,
        loop: true,
        autoplay: { delay: 3500, disableOnInteraction: false },
        navigation: {
            nextEl: ".arrivalSwiper .swiper-button-next",
            prevEl: ".arrivalSwiper .swiper-button-prev",
        },
        breakpoints: {
            640: { slidesPerView: 3 },
            768: { slidesPerView: 4 },
            1024: { slidesPerView: 5 },
        },
    });
</script>
