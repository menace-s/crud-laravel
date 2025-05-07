@extends('layouts.app')

@section('title', 'Détails de l\'animal')

@section('content')
    <h1>Détails de l'animal</h1>
    <a href="{{ route('animals.index') }}" class="btn btn-secondary mb-3">Retour</a>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $animal->name }}</h5>
            <p class="card-text"><strong>Espèce :</strong> {{ $animal->species }}</p>
            <p class="card-text"><strong>Propriétaire :</strong> {{ $animal->owner_name }}</p>
            <p class="card-text"><strong>État de santé :</strong> {{ $animal->health_status }}</p>
            <a href="{{ route('animals.edit', $animal) }}" class="btn btn-warning">Modifier</a>
            <form action="{{ route('animals.destroy', $animal) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</button>
            </form>
        </div>
    </div>
@endsection