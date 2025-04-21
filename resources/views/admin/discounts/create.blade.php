@extends('layouts.admin')
@section('title', 'Créer une remise')

@section('content')
<div class="container mt-4">
    <h2>Créer une remise</h2>
    <form action="{{ route('discounts.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="type" class="form-label">Type de remise</label>
            <select name="type" id="type" class="form-control" required>
                <option value="all">Tous les produits</option>
                <option value="category">Par catégorie</option>
                <option value="product">Par produit</option>
            </select>
        </div>

        <div class="mb-3" id="category-div" style="display: none;">
            <label for="category_id" class="form-label">Catégorie</label>
            <select name="category_id" class="form-control">
                @foreach(\App\Models\Categorie::all() as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3" id="product-div" style="display: none;">
            <label for="product_id" class="form-label">Produit</label>
            <select name="product_id" class="form-control">
                @foreach(\App\Models\Product::all() as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="percentage" class="form-label">Pourcentage (%)</label>
            <input type="number" name="percentage" class="form-control" required step="0.1" min="0" max="100">
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Date de début</label>
            <input type="date" name="start_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">Date de fin</label>
            <input type="date" name="end_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>

<script>
    document.getElementById('type').addEventListener('change', function () {
        let type = this.value;
        document.getElementById('category-div').style.display = (type === 'category') ? 'block' : 'none';
        document.getElementById('product-div').style.display = (type === 'product') ? 'block' : 'none';
    });
</script>
@endsection
