<!-- resources/views/chef_zone/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-extrabold text-gray-800 leading-tight">
            👷 Chef de Zone – Affectation de Techniciens
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-2xl shadow-xl">
                <form method="POST" action="{{ route('chefZone.affecter') }}" class="space-y-8">
                    @csrf

                    <!-- Choix de la zone -->
                    <div>
                        <label for="section" class="block text-base font-bold text-orange-700 mb-2">
                            <span class="inline-block mr-2">📍</span>Choisissez votre zone
                        </label>
                        <select name="section" id="section" class="block w-full border-2 border-orange-300 rounded-2xl px-4 py-3 shadow-lg focus:ring-2 focus:ring-orange-400 focus:border-orange-500 transition" required>
                            @foreach($sections as $section)
                                <option value="{{ $section->id }}">{{ $section->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Technologie -->
                    <div>
                        <label for="technologie" class="block text-base font-bold text-orange-700 mb-2">
                            <span class="inline-block mr-2">🔌</span>Technologie
                        </label>
                        <select name="technologie" id="technologie" class="block w-full border-2 border-orange-300 rounded-2xl px-4 py-3 shadow-lg focus:ring-2 focus:ring-orange-400 focus:border-orange-500 transition" required>
                            <option value="cuivre">Cuivre</option>
                            <option value="fibre">Fibre</option>
                            <option value="5G">5G</option>
                        </select>
                    </div>

                    <!-- Service -->
                    <div>
                        <label for="service" class="block text-base font-bold text-orange-700 mb-2">
                            <span class="inline-block mr-2">🛠️</span>Service
                        </label>
                        <select name="service" id="service" class="block w-full border-2 border-orange-300 rounded-2xl px-4 py-3 shadow-lg focus:ring-2 focus:ring-orange-400 focus:border-orange-500 transition" required>
                            <option value="SAV">SAV</option>
                            <option value="PROD">PROD</option>
                        </select>
                    </div>

                    <!-- Séparateur -->
                    <hr class="my-6 border-orange-200">

                    <!-- Liste des techniciens -->
                    <div>
                        <h4 class="text-xl font-extrabold text-orange-800 mb-4 flex items-center">
                            <span class="mr-2">👥</span>Liste des techniciens
                            <span class="ml-3 bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-xs font-semibold">{{ $techniciens->count() }} disponibles</span>
                        </h4>
                        <div class="grid md:grid-cols-2 gap-4">
                            @forelse($techniciens as $technicien)
                                <label class="flex items-center bg-orange-50 px-4 py-3 rounded-xl shadow hover:shadow-lg transition cursor-pointer border border-orange-100 hover:border-orange-400">
                                    <input type="checkbox" name="techniciens[]" value="{{ $technicien->id }}" class="form-checkbox text-orange-600 mr-3 scale-125 accent-orange-500">
                                    <span class="text-base text-gray-800 font-medium">
                                        {{ $technicien->prenom }} {{ $technicien->nom }}
                                        <span class="ml-2 text-xs bg-orange-200 text-orange-800 px-2 py-0.5 rounded">📞 {{ $technicien->telephone }}</span>
                                    </span>
                                </label>
                            @empty
                                <p class="text-sm text-gray-500 col-span-2">Aucun technicien disponible.</p>
                            @endforelse
                        </div>
                    </div>

                    <!-- Bouton de validation -->
                    <div class="flex justify-between items-center mt-8">
                        <a href="{{ route('chefZone.equipes') }}" class="text-orange-600 hover:underline font-semibold flex items-center transition">
                            <span class="mr-1">🔍</span>Voir les équipes disponibles
                        </a>
                        <button
                            type="submit"
                            class="bg-gradient-to-r from-orange-400 to-orange-600 hover:from-orange-500 hover:to-orange-700 text-white text-lg px-8 py-3 rounded-2xl font-bold shadow-lg hover:shadow-xl transition duration-200 flex items-center gap-2"
                        >
                            <span>✅</span> Valider l’affectation
                        </button>
                    </div>

                    <!-- Affichage des erreurs -->
                    @if($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mt-6 shadow">
                            <ul class="list-disc list-inside text-sm">
                                @foreach($errors->all() as $error)
                                    <li>⚠️ {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
