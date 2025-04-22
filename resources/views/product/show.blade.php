@extends('layouts.app')

@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')
<div class="bg-white shadow-md rounded-lg overflow-hidden mb-8 flex flex-col md:flex-row">
  
  <!-- Product Image -->
  <div class="md:w-1/2">
    <img src="{{ asset('/storage/'.$viewData['product']->getImage()) }}" alt="{{ $viewData['product']->getName() }}"
         class="w-full h-full object-cover">
  </div>

  <!-- Product Details -->
  <div class="md:w-1/2 p-6 flex flex-col justify-between">
    <div>
      <h2 class="text-2xl font-bold text-gray-800 mb-4">
        {{ $viewData['product']->getName() }}
      </h2>

      <!-- Price -->
      <div class="mb-4">
        @if($viewData['product']->isDiscountActive())
          <span class="line-through text-gray-400 text-lg">
            {{ $viewData['product']->getPrice() }} DH
          </span>
          <span class="text-red-600 font-bold text-2xl ml-2">
            {{ number_format($viewData['product']->getDiscountedPrice(), 2) }} DH
          </span>
        @else
          <span class="text-gray-800 font-semibold text-2xl">
            {{ $viewData['product']->getPrice() }} DH
          </span>
        @endif
      </div>

      <!-- Stock and Description -->
      <p class="mb-2 text-gray-600">
        <strong>Stock Available:</strong> {{ $viewData['product']->quantity_store }}
      </p>

      <p class="mb-6 text-gray-700">{{ $viewData['product']->getDescription() }}</p>
    </div>

    <!-- Add to Cart -->
    <form method="POST" action="{{ route('cart.add', ['id'=> $viewData['product']->getId()]) }}">
      @csrf
      <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
        <div class="flex items-center border border-gray-300 rounded-md overflow-hidden">
          <span class="bg-gray-200 px-3 py-2 text-gray-600 text-sm">Quantity</span>
          <input type="number" name="quantity" min="1"
                 max="{{ $viewData['product']->quantity_store }}"
                 value="1"
                 class="w-20 px-2 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                 {{ $viewData["product"]->quantity_store == 0 ? 'disabled' : '' }}>
        </div>
        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-md transition disabled:opacity-50"
                {{ $viewData["product"]->quantity_store == 0 ? 'disabled' : '' }}>
          Add to Cart
        </button>
      </div>
    </form>
  </div>
</div>
@endsection