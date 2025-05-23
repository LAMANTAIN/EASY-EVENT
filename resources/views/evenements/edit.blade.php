@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-xl font-bold mb-4">Modifier l’événement</h1>

    <form method="POST" action="{{ route('evenements.update', $evenement) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="titre">Titre</label>
            <input type="text" name="titre" class="w-full border p-2" value="{{ $evenement->titre }}" required>
        </div>

        <div class="mb-4">
            <label for="description">Description</label>
            <textarea name="description" class="w-full border p-2">{{ $evenement->description }}</textarea>
        </div>

        <div class="mb-4">
            <label for="date">Date</label>
            <input type="date" name="date" class="w-full border p-2" value="{{ $evenement->date }}" required>
        </div>

        <div class="mb-4">
            <label for="lieu">Lieu</label>
            <input type="text" name="lieu" class="w-full border p-2" value="{{ $evenement->lieu }}" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Mettre à jour</button>
    </form>
</div>
@endsection
