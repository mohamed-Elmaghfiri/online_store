@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<form method="GET" action="{{ route('product.index') }}" class="mb-4">
  <label for="on_sale" class="form-label fw-bold">Filtrer:</label>
  <select name="on_sale" onchange="this.form.submit()" class="form-select w-auto d-inline-block ms-2">
    <option value="">Tous les produits</option>
    <option value="1" {{ request('on_sale') == '1' ? 'selected' : '' }}>Produits en solde</option>
  </select>
</form>

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

          <div class="mt-2">
  @if($product->isDiscountActive())
    <span class="text-muted text-decoration-line-through">
      {{ $product->price }} DH
    </span>
    <span class="fw-bold text-danger">
  {{ $product->getFormattedDiscountedPrice() }} DH
</span>
  @else
    <span class="fw-bold">
      {{ $product->price }} DH
    </span>
  @endif
</div>


        </div>
      </div>
    </div>
  @endforeach
  <div class="d-flex justify-content-center">
    {{ $viewData["products"]->links() }}
</div>
</div>
@endsection
