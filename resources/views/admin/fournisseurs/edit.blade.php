@extends('layouts.admin')

@section('title', 'Edit Fournisseur')

@section('content')
<div class="bg-white shadow rounded-lg p-6">
    <h3 class="text-xl font-bold mb-4">Edit Fournisseur</h3>

    @if($errors->any())
        <ul class="bg-red-100 text-red-700 p-4 rounded mb-4">
            @foreach($errors->all() as $error)
                <li>- {{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ url('/admin/fournisseurs/' . $viewData['fournisseur']->id) }}" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700">Raison Social</label>
            <input type="text" name="raison_social" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ old('raison_social', $viewData['fournisseur']->raison_social) }}">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Adresse</label>
            <input type="text" name="adresse" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ old('adresse', $viewData['fournisseur']->adresse) }}">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Telephone</label>
            <input type="text" name="tele" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ old('tele', $viewData['fournisseur']->tele) }}">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ old('email', $viewData['fournisseur']->email) }}">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" rows="3">{{ old('description', $viewData['fournisseur']->description) }}</textarea>
        </div>

        <div class="flex items-center space-x-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
            <a href="{{ url('/admin/fournisseurs') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancel</a>
        </div>
    </form>
</div>
@endsection