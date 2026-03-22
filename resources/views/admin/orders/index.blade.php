@extends('admin.dashboard')

@section('title', 'manage order')

@section('admin_layout')


<div class="container-fluid p-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Customer Orders</h4>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Order No</th>
                            <th>Customer Name</th>
                            <th>Total Amount</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->order_number }}</td>
                     <td>{{ $order->name }} <br> <small>{{ $order->phone }}</small></td>
                            <td>৳{{ number_format($order->total_amount, 2) }}</td>
                            <td>
                                <span class="badge {{ $order->payment_status == 'paid' ? 'badge-success' : 'badge-warning' }}">
                                    {{ strtoupper($order->payment_status) }}
                                </span>
                                <br><small>{{ strtoupper($order->payment_method) }}</small>
                            </td>
                            <td>
                                <span class="badge badge-info">{{ strtoupper($order->order_status) }}</span>
                            </td>
                            <td>{{ $order->created_at->format('d M, Y') }}</td>
                            <td>
                                <a href="{{ route('admin.orders.show', $order->id) }}"
                                    class="btn btn-sm btn-primary">View</a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $orders->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
