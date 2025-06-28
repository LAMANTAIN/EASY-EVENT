<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Événements publics</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">🎉 Événements publics</h1>

        <ul class="space-y-4">
            @foreach ($evenements as $event)
                <li class="bg-white rounded shadow p-4">
                    <h2 class="text-xl font-semibold">{{ $event->titre }}</h2>
                    <p class="text-gray-700">{{ $event->description }}</p>
                    <p class="text-sm text-gray-500 mt-2">
                        📍 {{ $event->lieu }} — 🗓️ {{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}
                    </p>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>


@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">🎉 Événements publics</h1>

    <ul class="mt-4 space-y-4">
        @foreach ($evenements as $event)
            <li class="border border-gray-300 p-4 rounded shadow">
                <h2 class="text-xl font-semibold">{{ $event->titre }}</h2>
                <p class="text-gray-700">{{ $event->description }}</p>
                <p class="text-sm text-gray-500 mt-2">
                    📍 {{ $event->lieu }} — 🗓️ {{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}
                </p>
            </li>
        @endforeach
    </ul>
</div>
@endsection