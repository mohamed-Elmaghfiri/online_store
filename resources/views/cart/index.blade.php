@extends('layouts.app')

@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')
<div class="bg-white shadow-md rounded-lg p-6 mb-8 flex flex-col justify-between">

  <h2 class="text-2xl font-bold mb-4 text-gray-800">🛒 Products in Your Cart</h2>

  @if (count($viewData["products"]) > 0)
  <div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300 rounded-md">
      <thead class="bg-gray-100 text-gray-700">
        <tr>
          <th class="px-4 py-2 border-b">ID</th>
          <th class="px-4 py-2 border-b">Name</th>
          <th class="px-4 py-2 border-b">Price</th>
          <th class="px-4 py-2 border-b">Quantity</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($viewData["products"] as $product)
        <tr class="text-center">
          <td class="px-4 py-2 border-b">{{ $product->getId() }}</td>
          <td class="px-4 py-2 border-b">{{ $product->getName() }}</td>
          <td class="px-4 py-2 border-b">{{ number_format($product->getPrice(), 2) }} DH</td>
          <td class="px-4 py-2 border-b">{{ $viewData['productsInCookie'][$product->getId()] ?? 0 }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <div class="row">

        <div class="text-end">
        <form action="{{ route('payment.add') }}" method="POST">
        @csrf
          <a class="btn btn-outline-secondary mb-2">
            <b>Total to pay:</b> ${{ $viewData["total"] }}
          </a>

          @if (count($viewData["products"]) > 0)
          <div class="mb-3">
            <label for="payment_method" class="form-label">Choose Payment Method:</label>
            <select name="payment_method" id="payment_method" class="form-control" required>
              <option value="Cash on Delivery">Cash on Delivery</option>
              
            </select>
          </div> <button type="submit" class="btn btn-success mb-2">Confirm Order</button>
          </form>
         
         <!-- <a href="{{ route('cart.purchase') }}" class="btn bg-primary text-white mb-2">Purchase</a> -->
          <a href="{{ route('cart.delete') }}" class="btn btn-danger mb-2">
            Remove all products from Cart
          </a>
          @endif
        </div>

    </div>
  </div>
  @else
  <div class="text-center py-10">
    <p class="text-lg font-semibold text-gray-600">🛒 Your cart is currently empty.</p>
    <a href="{{ route('product.index') }}" 
       class="mt-4 inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md transition">
      🛍️ Continue Shopping
    </a>
  </div>
  @endif

</div>
@endsection