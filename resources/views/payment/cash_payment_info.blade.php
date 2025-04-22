@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Delivery Information - Cash on Delivery</h2>
    <form action="{{ route('payments.processOnline') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Full Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group mt-2">
            <label for="phone">Phone Number:</label>
            <input type="text" name="phone" class="form-control" required>
        </div>

        <div class="form-group mt-2">
            <label for="address">Address:</label>
            <textarea name="address" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Confirm Order</button>
    </form>
</div>
@endsection