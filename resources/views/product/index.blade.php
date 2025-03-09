@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="row">
  @foreach ($viewData["products"] as $product)
    <div class="col-md-4 col-lg-3 mb-2">
      <div class="card position-relative">
        <img src="{{ asset('/storage/'.$product->getImage()) }}" class="card-img-top img-card">
        @if($product->quantity_store == 0)
          <span class="position-absolute top-0 end-0 m-3 btn btn-danger">Out of Stock</span>
        @endif
        <div class="card-body text-center">
          <a href="{{ route('product.show', ['id'=> $product->getId()]) }}"
             class="btn bg-primary text-white">
            {{ $product->getName() }}
          </a>
        </div>
      </div>
    </div>
  @endforeach
</div>
@endsection
