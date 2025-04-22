@extends('layouts.admin')
@section('title', 'Créer une remise')

@section('content')
<div class="container mx-auto mt-8">
    <h2 class="text-2xl font-bold mb-6">Créer une remise</h2>
    <form action="{{ route('discounts.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="type" class="block text-sm font-medium text-gray-700">Type de remise</label>
            <select name="type" id="type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                <option value="all">Tous les produits</option>
                <option value="category">Par catégorie</option>
                <option value="product">Par produit</option>
            </select>
        </div>

        <div id="category-div" class="hidden">
            <label for="category_id" class="block text-sm font-medium text-gray-700">Catégorie</label>
            <select name="category_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @foreach(\App\Models\Categorie::all() as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div id="product-div" class="hidden">
            <label for="product_id" class="block text-sm font-medium text-gray-700">Produit</label>
            <select name="product_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @foreach(\App\Models\Product::all() as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="percentage" class="block text-sm font-medium text-gray-700">Pourcentage (%)</label>
            <input type="number" name="percentage" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required step="0.1" min="0" max="100">
        </div>

        <div>
            <label for="start_date" class="block text-sm font-medium text-gray-700">Date de début</label>
            <input type="date" name="start_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div>
            <label for="end_date" class="block text-sm font-medium text-gray-700">Date de fin</label>
            <input type="date" name="end_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Ajouter</button>
    </form>
</div>

<script>
    document.getElementById('type').addEventListener('change', function () {
        let type = this.value;
        document.getElementById('category-div').classList.toggle('hidden', type !== 'category');
        document.getElementById('product-div').classList.toggle('hidden', type !== 'product');
    });
</script>
@endsection