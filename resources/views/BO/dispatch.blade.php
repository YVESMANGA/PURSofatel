<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Visualisation du fichier : {{ $fichier->nom ?? 'Fichier #' . $fichier->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto px-4 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4">Demandes importées :</h3>

                @if($demandes->isEmpty())
                    <p class="text-gray-500">Aucune demande trouvée pour ce fichier.</p>
                @else
                    @php
                        $colonnesVisibles = [
                            'nd', 'zone', 'priorite_de_traitement', 'offre', 'type', 
                            'age', 'nom_du_client', 'prenom_du_client'
                        ];
                    @endphp

                    <div class="overflow-auto max-h-[500px] max-w-full">
                        <table class="table-auto border border-collapse text-xs w-full">
                            <thead>
                                <tr class="bg-gray-100 text-left">
                                    @foreach($colonnesVisibles as $col)
                                        <th class="border px-2 py-1 whitespace-nowrap">
                                            {{ Str::title(str_replace('_', ' ', $col)) }}
                                        </th>
                                    @endforeach
                                    {{-- Ajout de la colonne Équipe --}}
                                    <th class="border px-2 py-1 whitespace-nowrap bg-gray-50">Équipe</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($demandes as $demande)
                                    <tr>
                                        @foreach($colonnesVisibles as $key)
                                            <td class="border px-2 py-1 whitespace-nowrap">
                                                {{ $demande->$key }}
                                            </td>
                                        @endforeach
                                        {{-- Cellule vide pour Équipe --}}
                                        <td class="border px-2 py-1 bg-gray-50"></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
