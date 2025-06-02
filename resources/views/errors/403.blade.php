@extends('layouts.app')

@section('title', 'Accès refusé')

@section('content')
<div class="container mx-auto py-12 text-center">
    <h1 class="text-4xl font-bold text-red-600 mb-4">403 - Accès refusé</h1>
    <p class="text-lg text-gray-700 mb-6">
        Vous n’avez pas l’autorisation d’accéder à cette ressource.
    </p>
    <a href="{{ url()->previous() }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded">
        ⬅ Revenir en arrière
    </a>
</div>
@endsection
