@extends('layouts.app')

@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')
<!-- Product Filter -->
<div class="mb-6">
  <form method="GET" action="{{ route('product.index') }}" class="flex items-center space-x-4">
    <label for="on_sale" class="text-lg font-semibold">Filter Products:</label>
    <select name="on_sale" onchange="this.form.submit()"
      class="px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500">
      <option value="">All Products</option>
      <option value="1" {{ request('on_sale') == '1' ? 'selected' : '' }}>On Sale</option>
    </select>
  </form>
</div>

<!-- Product List -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
  @foreach ($viewData["products"] as $product)
  <div class="bg-white rounded-lg shadow hover:shadow-lg transition duration-300 relative overflow-hidden">

    <!-- Product Image -->
    <img src="{{ asset('/storage/' . $product->getImage()) }}" alt="{{ $product->getName() }}"
      class="w-full h-48 object-cover rounded-t-lg">

    <!-- Out of Stock Badge -->
    @if($product->quantity_store == 0)
    <span
      class="absolute top-3 right-3 bg-red-600 text-white text-sm font-bold px-3 py-1 rounded-full shadow-md">Out of Stock</span>
    @endif

    <!-- Product Details -->
    <div class="p-4 text-center">
      <a href="{{ route('product.show', ['id'=> $product->getId()]) }}"
        class="text-lg font-bold text-blue-700 hover:underline block">
        {{ $product->getName() }}
      </a>

      <!-- Price -->
      <div class="mt-2">
        @if($product->isDiscountActive())
        <div class="flex justify-center items-center gap-2">
          <span class="line-through text-gray-400 text-sm">{{ $product->price }} DH</span>
          <span class="text-red-600 font-bold text-lg">{{ $product->getFormattedDiscountedPrice() }} DH</span>
        </div>
        @else
        <span class="text-gray-800 font-semibold text-lg">{{ $product->price }} DH</span>
        @endif
      </div>
    </div>
  </div>
  @endforeach
</div>

<!-- Pagination -->
<div class="mt-8 flex justify-center">
  <nav class="inline-flex rounded-md shadow">
    {{ $viewData["products"]->links('pagination::tailwind') }}
  </nav>
</div>
@endsection