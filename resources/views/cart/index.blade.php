@extends('layouts.app')

@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')
<div class="card">
  <div class="card-header">
    Products in Cart
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped text-center">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Price</th>
          <th scope="col">Quantity</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($viewData["products"] as $product)
        <tr>
          <td>{{ $product->getId() }}</td>
          <td>{{ $product->getName() }}</td>
          <td>${{ $product->getPrice() }}</td>
          <td>{{ $viewData['productsInCookie'][$product->getId()] ?? 0 }}</td>
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
</div>
@endsection