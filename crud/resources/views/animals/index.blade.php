@extends('layouts.app')

@section('title', 'Liste des animaux')

@section('content')
    <h1>Liste des animaux</h1>
    <a href="{{ route('animals.create') }}" class="btn btn-primary mb-3">Ajouter un animal</a>
    <a href="{{ route('logout') }}" class="btn btn-danger mb-3">Déconnexion</a>

    {{-- Affichage des messages de succès ou d'erreur --}}

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Espèce</th>
                <th>Propriétaire</th>
                <th>État de santé</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($animals as $animal)
                <tr>
                    <td>{{ $animal->name }}</td>
                    <td>{{ $animal->species }}</td>
                    <td>{{ $animal->owner_name }}</td>
                    <td>{{ $animal->health_status }}</td>
                    <td>
                        <a href="{{ route('animals.show', $animal) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('animals.edit', $animal) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('animals.destroy', $animal) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {{ $animals->links() }} --}}
@endsection