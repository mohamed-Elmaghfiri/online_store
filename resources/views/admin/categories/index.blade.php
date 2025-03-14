@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card">
    <div class="card-header">
      <div class="card mb-4">
        <div class="card-header">
          Create Category
        </div>
        <div class="card-body">
          @if($errors->any())
          <ul class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $error)
            <li>- {{ $error }}</li>
            @endforeach
          </ul>
          @endif
      
          <form method="POST" action="{{ route('admin.categorie.store') }}">
            @csrf
            <div class="mb-3 row">
              <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Name:</label>
              <div class="col-lg-10 col-md-6 col-sm-12">
                <input name="name" value="{{ old('name') }}" type="text" class="form-control">
              </div>
            </div>
      
            <div class="mb-3">
              <label class="form-label">Description</label>
              <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
            </div>
      
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
      
      Manage Categories
    </div>
    <div class="card-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($viewData["categories"] as $categorie)
          <tr>
            <td>{{ $categorie["id"]}}</td>
            <td>{{ $categorie["name"]}}</td>
            <td>{{ $categorie["description"]}}</td>
            <td>
              <a class="btn btn-primary" href="{{route('admin.categorie.edit', ['id'=> $categorie["id"]])}}">
                <i class="bi-pencil"></i>
              </a>
            </td>
            <td>
              <form action="{{ route('admin.categorie.delete', $categorie["id"])}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">
                  <i class="bi-trash"></i>
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="d-flex justify-content-center">
        {{ $viewData["categories"]->links() }}
    </div>
    </div>
@endsection
