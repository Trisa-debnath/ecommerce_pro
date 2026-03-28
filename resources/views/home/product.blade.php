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
