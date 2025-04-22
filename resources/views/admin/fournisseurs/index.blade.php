@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')

<!-- Create Fournisseur Section -->
<div class="bg-white shadow rounded-lg p-6 mb-8">
    <h3 class="text-xl font-bold mb-4">Create Fournisseur</h3>
    @if($errors->any())
    <ul class="bg-red-100 text-red-700 p-4 rounded mb-4">
        @foreach($errors->all() as $error)
        <li>- {{ $error }}</li>
        @endforeach
    </ul>
    @endif

    <form method="POST" action="{{ route('fournisseurs.store') }}" class="space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700">Raison Social:</label>
            <input name="raison_social" value="{{ old('raison_social') }}" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Adresse:</label>
            <input name="adresse" value="{{ old('adresse') }}" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Telephone:</label>
            <input name="tele" value="{{ old('tele') }}" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Email:</label>
            <input name="email" value="{{ old('email') }}" type="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Description:</label>
            <textarea name="description" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Submit</button>
    </form>
</div>

<!-- Manage Fournisseurs Section -->
<div class="bg-white shadow rounded-lg p-6">
    <h3 class="text-xl font-bold mb-4">Manage Fournisseurs</h3>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">ID</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Raison Social</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Adresse</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Telephone</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Email</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Description</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Edit</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Delete</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($viewData["fournisseurs"] as $fournisseur)
                <tr>
                    <td class="px-4 py-2 text-sm text-gray-700">{{ $fournisseur->id }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">{{ $fournisseur->raison_social }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">{{ $fournisseur->adresse }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">{{ $fournisseur->tele }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">{{ $fournisseur->email }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">{{ $fournisseur->description }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('fournisseurs.edit', $fournisseur->id) }}" class="text-blue-500 hover:underline">
                            <i class="bi-pencil"></i> Edit
                        </a>
                    </td>
                    <td class="px-4 py-2">
                        <form action="{{ route('fournisseurs.destroy', $fournisseur->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">
                                <i class="bi-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection