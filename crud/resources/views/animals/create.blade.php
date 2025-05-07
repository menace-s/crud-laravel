@extends('layouts.app')

@section('title', 'Ajouter un animal')

@section('content')
    <h1>Ajouter un animal</h1>
    <a href="{{ route('animals.index') }}" class="btn btn-secondary mb-3">Retour</a>

    <form action="{{ route('animals.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="species" class="form-label">Espèce</label>
            <input type="text" name="species" id="species" class="form-control" value="{{ old('species') }}">
            @error('species')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="owner_name" class="form-label">Nom du propriétaire</label>
            <input type="text" name="owner_name" id="owner_name" class="form-control" value="{{ old('owner_name') }}">
            @error('owner_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="health_status" class="form-label">État de santé</label>
            <select name="health_status" id="health_status" class="form-select">
                <option value="sain" {{ old('health_status') == 'sain' ? 'selected' : '' }}>Sain</option>
                <option value="malade" {{ old('health_status') == 'malade' ? 'selected' : '' }}>Malade</option>
                <option value="blessé" {{ old('health_status') == 'blessé' ? 'selected' : '' }}>Blessé</option>
            </select>
            @error('health_status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
@endsection