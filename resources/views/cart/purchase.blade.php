@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
  <div class="border-b pb-4 mb-4">
    <h3 class="text-lg font-semibold text-gray-800">Purchase Completed</h3>
  </div>
  <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
    <span class="block sm:inline">
      Congratulations, purchase completed. Order number is 
      <b>#{{ $viewData["order"]->getId() }}</b>
    </span>
  </div>
</div>
@endsection