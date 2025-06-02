<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Visualisation du fichier : {{ $fichier->nom ?? 'Fichier #' . $fichier->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4">Demandes importées :</h3>

                @if($demandes->isEmpty())
                    <p class="text-gray-500">Aucune demande trouvée pour ce fichier.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-[2000px] table-auto border border-collapse text-xs">
                            <thead>
                                <tr class="bg-gray-100 text-left">
                                    @foreach(array_keys($demandes->first()->getAttributes()) as $col)
                                        @if(!in_array($col, ['id', 'fichier_importe_id', 'created_at', 'updated_at']))
                                            <th class="border px-2 py-1">{{ Str::title(str_replace('_', ' ', $col)) }}</th>
                                        @endif
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Le tri des demandes doit être fait idéalement au contrôleur --}}
                                @foreach($demandes as $demande)
                                    <tr>
                                        @foreach($demande->getAttributes() as $key => $value)
                                            @if(!in_array($key, ['id', 'fichier_importe_id', 'created_at', 'updated_at']))
                                                <td class="border px-2 py-1">{{ $value }}</td>
                                            @endif
                                        @endforeach
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
