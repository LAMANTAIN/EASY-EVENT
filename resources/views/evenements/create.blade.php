@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-xl font-bold mb-4">Créer un événement</h1>

    <form method="POST" action="{{ route('evenements.store') }}">
        @csrf

        <div class="mb-4">
            <label for="titre">Titre</label>
            <input type="text" name="titre" class="w-full border p-2" required>
        </div>

        <div class="mb-4">
            <label for="description">Description</label>
            <textarea name="description" class="w-full border p-2"></textarea>
        </div>

        <div class="mb-4">
            <label for="date">Date</label>
            <input type="date" name="date" class="w-full border p-2" required>
        </div>

        <div class="mb-4">
            <label for="lieu">Lieu</label>
            <input type="text" name="lieu" class="w-full border p-2" required>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Créer</button>
    </form>
</div>
@endsection
