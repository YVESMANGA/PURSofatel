<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-extrabold text-gray-800 leading-tight">
            📌 Liste des équipes disponibles
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            @forelse($equipes as $equipe)
                <div class="mb-6 p-5 rounded-xl bg-white border shadow-sm hover:shadow-md transition">
                    <h4 class="text-lg font-bold text-orange-600 mb-1">
                        🔸 Équipe – Zone {{ $equipe->section->nom ?? 'Non défini' }}
                    </h4>
                    <p class="text-sm"><strong>Service :</strong> {{ $equipe->service }}</p>
                    <p class="text-sm"><strong>Technologie :</strong> {{ $equipe->technologie }}</p>
                    <p class="text-sm"><strong>Chef de zone :</strong> {{ $equipe->chefZone->user->name ?? 'Inconnu' }}</p>

                    <h5 class="mt-3 font-semibold">👨‍🔧 Techniciens affectés :</h5>
                    <ul class="list-disc list-inside text-sm text-gray-700">
                        @forelse($equipe->techniciens as $technicien)
                            <li>{{ $technicien->prenom }} {{ $technicien->nom }} ({{ $technicien->telephone }})</li>
                        @empty
                            <li class="text-gray-500">Aucun technicien affecté.</li>
                        @endforelse
                    </ul>
                </div>
            @empty
                <p class="text-gray-600">Aucune équipe disponible pour le moment.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
