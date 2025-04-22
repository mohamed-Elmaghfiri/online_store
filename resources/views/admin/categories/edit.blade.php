@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="bg-white shadow rounded-lg p-6">
  <h2 class="text-xl font-bold mb-4">Edit Category</h2>
  @if($errors->any())
  <ul class="bg-red-100 text-red-700 p-4 rounded mb-4">
    @foreach($errors->all() as $error)
    <li>- {{ $error }}</li>
    @endforeach
  </ul>
  @endif

  <form method="POST" action="{{ route('admin.categorie.update', ['id' => $viewData['categorie']->id]) }}" class="space-y-4">
    @csrf
    @method('PUT')
    <div>
      <label class="block text-sm font-medium text-gray-700">Name:</label>
      <input name="name" value="{{ $viewData['categorie']->name }}" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div>
      <label class="block text-sm font-medium text-gray-700">Description:</label>
      <textarea name="description" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ $viewData['categorie']->description }}</textarea>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit</button>
  </form>
</div>
@endsection