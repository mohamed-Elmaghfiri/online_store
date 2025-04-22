@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Orders List</h2>

    {{-- إذا لم يكن هناك أي طلبات --}}
    @if($orders->isEmpty())
        <div class="alert alert-info text-center">There are no orders currently.</div>
    @else
        @foreach($orders as $order)
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white">
                <strong>Order ID:</strong> {{ $order->id }} | 
                <strong>User:</strong> {{ $order->user->name }} 
            </div>

            <div class="card-body">
                <p><strong>Status:</strong> {{ $order->status }}</p>
                <p><strong>Payment Method:</strong> {{ $order->payment_method }}</p>
                <p><strong>Total:</strong> {{ number_format($order->total, 2) }} DH</p>
                <p><strong>Name:</strong> {{ $order->name }}</p>
                <p><strong>Phone:</strong> {{ $order->phone }}</p>
                <p><strong>Address:</strong> {{ $order->address }}</p>
                <p><strong>Created At:</strong> {{ $order->created_at->format('Y-m-d H:i') }}</p>

                <h5 class="mt-4">Products:</h5>
                <table class="table table-bordered mt-2">
                    <thead class="table-light">
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->price, 2) }} DH</td>
                            <td>{{ number_format($item->quantity * $item->price, 2) }} DH</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endforeach


        <div class="d-flex justify-content-center mt-4">
            {{ $orders->links() }}
        </div>
    @endif
</div>
@endsection
