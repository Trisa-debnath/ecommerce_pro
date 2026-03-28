<?php

use Livewire\Volt\Component;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;

new #[Layout('components.home.shop_layout')]
#[Middleware('auth')]
class extends Component {
    public $name = '';
    public $email = '';
    public $phone = '';
    public $address = '';
    public $city = '';
    public $payment_method = 'cod';

    public function mount() {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    public function placeOrder() {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits_between:10,15'
            'address' => 'required',
            'city' => 'required',
        ]);

        $cart = session()->get('cart', []);
    if(empty($cart)) {
        $this->dispatch('swal:modal',
        ['type' => 'error',
            'title' => 'Oops!',
            'text' => 'Your cart is empty!',
            'icon' => 'error'
        ]);
        return;
        }

        $total = 0;
    foreach($cart as $item) {
        $total += (float)$item['price'] * (int)$item['quantity'];
    }

        $order = Order::create([
            'user_id' => Auth::id(),
            'order_number' => 'ORD-' . strtoupper(Str::random(10)),
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'city' => $this->city,
            'total_amount' => $total,
            'payment_method' => $this->payment_method,
            'status' => 'pending',
        ]);

        foreach($cart as $id => $item) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
            Product::find($id)->decrement('quantity', $item['quantity']);
        }

        session()->forget('cart');
        $this->dispatch('cartUpdated');
        return redirect()->route('order.success', $order->id);
    }
}; ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <h2 class="mb-4 text-center font-weight-bold" style="color: #333;">Checkout</h2>

            <div class="row">
                <div class="col-md-7 mb-4">
                    <div class="card shadow-sm border-0 rounded-lg">
                        <div class="card-header bg-white py-3">
                            <h5 class="mb-0 font-weight-bold"><i class="fa fa-truck mr-2"></i> Shipping Information</h5>
                        </div>
                        <div class="card-body p-4">
                            <form wire:submit.prevent="placeOrder">
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold">Full Name</label>
                                    <input type="text" wire:model="name" class="form-control" placeholder="Enter full name">
                                    @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label class="font-weight-bold">Email Address</label>
                                        <input type="email" wire:model="email" class="form-control" placeholder="Email">
                                        @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-6 form-group mb-3">
                                        <label class="font-weight-bold">Phone Number</label>
                                        <input type="text" wire:model="phone" class="form-control" placeholder="01XXX-XXXXXX">
                                        @error('phone') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="font-weight-bold">City</label>
                                    <input type="text" wire:model="city" class="form-control" placeholder="Enter city">
                                    @error('city') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="font-weight-bold">Shipping Address</label>
                                    <textarea wire:model="address" class="form-control" rows="3" placeholder="Street address, house no, etc."></textarea>
                                    @error('address') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>

                                <hr class="my-4">

                                <h5 class="font-weight-bold mb-3">Payment Method</h5>
                                <div class="payment-options">
                                    <div class="custom-control custom-radio mb-2">
                                        <input type="radio" id="cod" wire:model="payment_method" value="cod" class="custom-control-input">
                                        <label class="custom-control-label" for="cod">Cash on Delivery (COD)</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="online" wire:model="payment_method" value="online" class="custom-control-input">
                                        <label class="custom-control-label" for="online">Online Payment (bKash/SSL)</label>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-danger btn-block mt-4 py-3 font-weight-bold shadow-sm" style="background-color: #f7444e; border-radius: 8px;">
                                    PLACE ORDER NOW
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="card shadow-sm border-0 rounded-lg sticky-top" style="top: 20px;">
                        <div class="card-header bg-light py-3">
                            <h5 class="mb-0 font-weight-bold">Order Summary</h5>
                        </div>
                        <div class="card-body">
                            @php $cart = session()->get('cart', []); $total = 0; @endphp

                            <div class="cart-items mb-3" style="max-height: 300px; overflow-y: auto;">
                                @foreach($cart as $item)
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div>
                                            <h6 class="mb-0 font-weight-bold">{{ $item['name'] }}</h6>
                                            <small class="text-muted">Qty: {{ $item['quantity'] }}</small>
                                        </div>
                                        <span class="font-weight-bold text-dark">৳{{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                                    </div>
                                    @php $total += $item['price'] * $item['quantity']; @endphp
                                @endforeach
                            </div>

                            <hr>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Subtotal</span>
                                <span>৳{{ number_format($total, 2) }}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Shipping Cost</span>
                                <span class="text-success">Free</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="font-weight-bold mb-0">Total</h5>
                                <h4 class="font-weight-bold mb-0 text-danger">৳{{ number_format($total, 2) }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
