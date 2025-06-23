@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-xl font-bold mb-4">Mes événements</h1>

    <a href="{{ route('evenements.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ Ajouter</a>

    <ul class="mt-4 space-y-2">
        @foreach ($evenements as $event)
            <li class="border p-4">
                <strong>{{ $event->titre }}</strong><br>
                {{ $event->date }} - {{ $event->lieu }}
                <div class="mt-2">
                    <a href="{{ route('evenements.edit', $event) }}" class="text-blue-600">Modifier</a>
                    <form action="{{ route('evenements.destroy', $event) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 ml-2" onclick="return confirm('Supprimer ?')">Supprimer</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection
