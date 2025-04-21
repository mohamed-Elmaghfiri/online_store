@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ asset('/storage/'.$viewData["product"]->getImage()) }}" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
          {{ $viewData["product"]->getName() }}
        </h5>

        {{-- السعر --}}
        <div class="mb-3">
          @if($viewData["product"]->isDiscountActive())
            <span class="text-muted text-decoration-line-through">
              {{ $viewData["product"]->getPrice() }} DH
            </span>
            <span class="fw-bold text-danger fs-4">
              {{ number_format($viewData["product"]->getDiscountedPrice(), 2) }} DH
            </span>
          @else
            <span class="fw-bold fs-4">
              {{ $viewData["product"]->getPrice() }} DH
            </span>
          @endif
        </div>

        <p class="card-text">
          <strong>Stock Available:</strong> {{ $viewData["product"]->quantity_store }}
        </p>

        <p class="card-text">{{ $viewData["product"]->getDescription() }}</p>

        {{-- إضافة إلى السلة --}}
        <form method="POST" action="{{ route('cart.add', ['id'=> $viewData['product']->getId()]) }}">
          @csrf
          <div class="row">
            <div class="col-auto">
              <div class="input-group col-auto">
                <div class="input-group-text">Quantity</div>
                <input type="number" min="1" max="{{$viewData["product"]->quantity_store}}" class="form-control quantity-input" name="quantity" value="1">
              </div>
            </div>
            <div class="col-auto">
              <button class="btn bg-primary text-white"
                {{ $viewData["product"]->quantity_store == 0 ? 'disabled' : '' }} 
                type="submit">
                Add to cart
              </button>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection
