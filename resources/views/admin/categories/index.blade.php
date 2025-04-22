@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="bg-white shadow rounded-lg p-6">
  <!-- Create Category Section -->
  <div class="mb-8">
    <h2 class="text-xl font-bold mb-4">Create Category</h2>
    @if($errors->any())
    <ul class="bg-red-100 text-red-700 p-4 rounded mb-4">
      @foreach($errors->all() as $error)
      <li>- {{ $error }}</li>
      @endforeach
    </ul>
    @endif

    <form method="POST" action="{{ route('admin.categorie.store') }}" class="space-y-4">
      @csrf
      <div>
        <label class="block text-sm font-medium text-gray-700">Name:</label>
        <input name="name" value="{{ old('name') }}" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Description:</label>
        <textarea name="description" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('description') }}</textarea>
      </div>
      <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Submit</button>
    </form>
  </div>

  <!-- Manage Categories Section -->
  <div>
    <h2 class="text-xl font-bold mb-4">Manage Categories</h2>
    <div class="overflow-x-auto">
      <table class="min-w-full bg-white border border-gray-200 rounded-lg">
        <thead class="bg-gray-100">
          <tr>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">ID</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Name</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Description</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Edit</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Delete</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          @foreach ($viewData["categories"] as $categorie)
          <tr>
            <td class="px-4 py-2 text-sm text-gray-700">{{ $categorie["id"] }}</td>
            <td class="px-4 py-2 text-sm text-gray-700">{{ $categorie["name"] }}</td>
            <td class="px-4 py-2 text-sm text-gray-700">{{ $categorie["description"] }}</td>
            <td class="px-4 py-2">
              <a href="{{ route('admin.categorie.edit', ['id' => $categorie["id"]]) }}" class="text-blue-500 hover:underline">
                <i class="bi-pencil"></i> Edit
              </a>
            </td>
            <td class="px-4 py-2">
              <form action="{{ route('admin.categorie.delete', $categorie["id"]) }}" method="POST">
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
    <div class="mt-4">
      {{ $viewData["categories"]->links('pagination::tailwind') }}
    </div>
  </div>
</div>
@endsection