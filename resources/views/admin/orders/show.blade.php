@extends('admin.dashboard')

@section('title', 'Order Details')

@section('admin_layout')
<div class="container-fluid p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="font-weight-bold text-dark"><i class="icon-doc mr-2">
            </i> Order: #{{ $order->order_number }}</h3> </br>
        <a href="{{ route('admin.orders') }}" class="btn btn-secondary shadow-sm">
            <i class="icon-arrow-left"></i> Back to List
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 font-weight-bold"><i class="icon-user mr-2 text-primary"></i> Customer Information</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="mb-1 text-muted">Customer Name</p>
                            <h6 class="font-weight-bold">{{ $order->name }}</h6>
                            <p class="mb-1 text-muted mt-3">Email Address</p>
                            <h6 class="font-weight-bold">{{ $order->email }}</h6>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-1 text-muted">Phone Number</p>
                            <h6 class="font-weight-bold">{{ $order->phone }}</h6>
                            <p class="mb-1 text-muted mt-3">Shipping Address</p>
                            <h6 class="font-weight-bold">{{ $order->address }}, {{ $order->city }}</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 font-weight-bold"><i class="icon-basket mr-2 text-primary"></i> Order Items</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="border-0 pl-4">Product Name</th>
                                    <th class="border-0 text-center">Price</th>
                                    <th class="border-0 text-center">Qty</th>
                                    <th class="border-0 text-right pr-4">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->orderDetails as $item)
                                <tr>
                                    <td class="pl-4 align-middle">
                                        <span class="font-weight-bold text-dark">{{ $item->product->name ?? 'Product Deleted' }}</span>
                                    </td>
                                    <td class="text-center align-middle">৳{{ number_format($item->price, 2) }}</td>
                                    <td class="text-center align-middle">
                                        <span class="badge badge-pill badge-light border px-3 py-2">{{ $item->quantity }}</span>
                                    </td>
                                    <td class="text-right pr-4 align-middle font-weight-bold">৳{{ number_format($item->price * $item->quantity, 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="bg-light">
                                <tr>
                                    <td colspan="3" class="text-right font-weight-bold">Grand Total:</td>
                                    <td class="text-right pr-4 font-weight-bold text-danger h5">৳{{ number_format($order->total_amount, 2) }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm border-0 mb-4 text-white" style="background: #4e73df; background: linear-gradient(180deg, #4e73df 10%, #224abe 100%);">
                <div class="card-body">
                    <h5 class="font-weight-bold mb-3">Order Status</h5>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Current Status:</span>
                        <span class="badge badge-light text-uppercase">{{ $order->order_status }}</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Payment:</span>
                        <span class="badge badge-light text-uppercase">{{ $order->payment_status }}</span>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 font-weight-bold"><i class="icon-settings mr-2 text-primary"></i> Action Center</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="font-weight-bold small text-uppercase">Update Order Status</label>
                            <select name="order_status" class="form-control custom-select">
                                <option value="pending" {{ $order->order_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="processing" {{ $order->order_status == 'processing' ? 'selected' : '' }}>Processing</option>
                                <option value="delivered" {{ $order->order_status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                <option value="cancelled" {{ $order->order_status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label class="font-weight-bold small text-uppercase">Update Payment Status</label>
                            <select name="payment_status" class="form-control custom-select">
                                <option value="pending" {{ $order->payment_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="paid" {{ $order->payment_status == 'paid' ? 'selected' : '' }}>Paid</option>
                            </select>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary btn-block py-2 font-weight-bold shadow-sm">
                            <i class="icon-check mr-1"></i> SAVE CHANGES
                        </button>
                    </form>
                </div>
            </div>

            <button class="btn btn-outline-dark btn-block mt-3 py-2"
            onclick="window.print()">
                <i class="icon-printer mr-1"></i> Print Invoice
            </button>
        </div>
    </div>
</div>

<style>
    .card { border-radius: 12px; }
    .card-header { border-bottom: 1px solid #f1f1f1; border-radius: 12px 12px 0 0 !important; }
    .table thead th { font-size: 13px; text-uppercase: true; color: #777; letter-spacing: 0.5px; }
    .custom-select { height: 45px; border-radius: 8px; }
    @media print {
        .btn, .action-center, .sidebar, .header { display: none !important; }
    }
</style>
@endsection
