@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <h2 class="text-2xl font-bold mb-6">Orders List</h2>

    {{-- إذا لم يكن هناك أي طلبات --}}
    @if($orders->isEmpty())
        <div class="bg-blue-100 text-blue-700 p-4 rounded text-center">
            There are no orders currently.
        </div>
    @else
        @foreach($orders as $order)
        <div class="bg-white shadow rounded-lg mb-6">
            <div class="bg-blue-500 text-white px-4 py-3 rounded-t-lg">
                <strong>Order ID:</strong> {{ $order->id }} | 
                <strong>User:</strong> {{ $order->user->name }}
            </div>

            <div class="p-4">
                <p><strong>Status:</strong> {{ $order->status }}</p>
                <p><strong>Payment Method:</strong> {{ $order->payment_method }}</p>
                <p><strong>Total:</strong> {{ number_format($order->total, 2) }} DH</p>
                <p><strong>Name:</strong> {{ $order->name }}</p>
                <p><strong>Phone:</strong> {{ $order->phone }}</p>
                <p><strong>Address:</strong> {{ $order->address }}</p>
                <p><strong>Created At:</strong> {{ $order->created_at->format('Y-m-d H:i') }}</p>

                <h5 class="text-lg font-bold mt-6">Products:</h5>
                <table class="min-w-full bg-white border border-gray-200 mt-4">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Product</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Quantity</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Unit Price</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($order->items as $item)
                        <tr>
                            <td class="px-4 py-2 text-sm text-gray-700">{{ $item->product->name }}</td>
                            <td class="px-4 py-2 text-sm text-gray-700">{{ $item->quantity }}</td>
                            <td class="px-4 py-2 text-sm text-gray-700">{{ number_format($item->price, 2) }} DH</td>
                            <td class="px-4 py-2 text-sm text-gray-700">{{ number_format($item->quantity * $item->price, 2) }} DH</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endforeach

    @endif
</div>
@endsection