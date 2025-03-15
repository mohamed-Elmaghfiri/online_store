@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<!-- Create Fournisseur Card -->
<div class="card">
    <div class="card-header">
        <div class="card mb-4">
            <div class="card-header">
                Create Fournisseur
            </div>
            <div class="card-body">
                @if($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach($errors->all() as $error)
                    <li>- {{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <form method="POST" action="{{ route('fournisseurs.store') }}">
                    @csrf
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Raison Social:</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="raison_social" value="{{ old('raison_social') }}" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Adresse:</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="adresse" value="{{ old('adresse') }}" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Telephone:</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="tele" value="{{ old('tele') }}" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Email:</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="email" value="{{ old('email') }}" type="email" class="form-control">
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
    </div>

    <!-- Manage Fournisseurs Card -->
    <div class="card-body">
        <h5>Manage Fournisseurs</h5>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Raison Social</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Description</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData["fournisseurs"] as $fournisseur)
                <tr>
                    <td>{{ $fournisseur->id }}</td>
                    <td>{{ $fournisseur->raison_social }}</td>
                    <td>{{ $fournisseur->adresse }}</td>
                    <td>{{ $fournisseur->tele }}</td>
                    <td>{{ $fournisseur->email }}</td>
                    <td>{{ $fournisseur->description }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('fournisseurs.edit', $fournisseur->id) }}">
                            <i class="bi-pencil"></i>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('fournisseurs.destroy', $fournisseur->id) }}" method="POST">
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

    </div>
</div>
@endsection
