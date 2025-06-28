<!-- resources/views/evenements/public.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Hello depuis Blade</h1>

<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Tous les événements</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach ($evenements as $event)
            <div class="p-4 border rounded shadow bg-white">
                <h2 class="text-xl font-semibold">{{ $event->titre }}</h2>
                <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</p>
                <p class="text-gray-600">{{ $event->lieu }}</p>
                <p class="mt-2 text-gray-700">{{ Str::limit($event->description, 100) }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection
