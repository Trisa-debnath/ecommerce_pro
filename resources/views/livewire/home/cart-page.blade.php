<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new #[Layout('home.shop_layout')]
#[Middleware('auth')]
class extends Component {

    // Cart theke item remove korar logic
    public function removeItem($id)
    {
        $cart = session()->get('cart');
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        $this->dispatch('cartUpdated'); // Header refresh korar jonno
        session()->flash('success', 'Item removed from cart!');
    }
}; ?>

<div class="container py-5">
    <h2 class="text-center mb-5 font-weight-bold">Your Shopping Cart</h2>

    @if(session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <div class="col-md-12">
            @if(session('cart') && count(session('cart')) > 0)
                <div class="table-responsive bg-white shadow-sm p-3 rounded">
                    <table class="table table-hover border">
                        <thead class="bg-light">
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0 @endphp
                            @foreach(session('cart') as $id => $details)
                                @php $total += $details['price'] * $details['quantity'] @endphp
    <tr>
     <td>
    <div class="d-flex align-items-center">
    <img src="{{ asset('uploads/products/'.$details['image']) }}"
     width="50" class="mr-3 rounded">
    <span class="font-weight-bold">{{ $details['name'] }}</span>
     </div>
    </td>
        <td>${{ number_format($details['price'], 2) }}</td>
            <td>{{ $details['quantity'] }}</td>
            <td>${{ number_format($details['price'] * $details['quantity'], 2) }}</td>
             <td>
    <button wire:click="removeItem({{ $id }})" class="btn btn-danger btn-sm">
                  <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

<div class="d-flex justify-content-end mt-4">
 <div class="card p-4 shadow-sm" style="width: 300px;">
         <h5 class="font-weight-bold">Total: ${{ number_format($total, 2) }}</h5>
                        <hr>
         <a href="{{ route('checkout') }}" class="btn btn-danger btn-block font-weight-bold" style="background-color: #f7444e; border-radius: 25px;">
                            PROCEED TO CHECKOUT
                        </a>
                    </div>
                </div>
            @else
                <div class="text-center py-5">
                    <h4 class="text-muted">Your cart is empty!</h4>
                    <a href="{{ url('/') }}" class="btn btn-primary mt-3">Continue Shopping</a>
                </div>
            @endif
        </div>
    </div>
</div>
