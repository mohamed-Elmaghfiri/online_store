@extends('layouts.admin')

@section('title', 'Edit Fournisseur')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Edit Fournisseur</h3>
    </div>

    <div class="card-body">
        @if($errors->any())
            <ul class="alert alert-danger list-unstyled">
                @foreach($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ url('/admin/fournisseurs/' . $viewData['fournisseur']->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Raison Social</label>
                <input type="text" name="raison_social" class="form-control" value="{{ old('raison_social', $viewData['fournisseur']->raison_social) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Adresse</label>
                <input type="text" name="adresse" class="form-control" value="{{ old('adresse', $viewData['fournisseur']->adresse) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Telephone</label>
                <input type="text" name="tele" class="form-control" value="{{ old('tele', $viewData['fournisseur']->tele) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $viewData['fournisseur']->email) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description', $viewData['fournisseur']->description) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ url('/admin/fournisseurs') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
