<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Importation des demandes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-lg font-bold mb-4">Importer les demandes</h2>

                    @if (session('success'))
                        <div class="text-green-600">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('demandes.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" required>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-2">Importer</button>
                    </form>
                </div>
            </div>

            <!-- Tableau des fichiers importés -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Fichiers Importés</h3>
                    
                    @if($fichiers->isEmpty())
                        <p>Aucun fichier importé pour le moment.</p>
                    @else
                        <table class="min-w-full border border-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 border">Nom du fichier</th>
                                    <th class="px-4 py-2 border">Visualisation</th>
                                    <th class="px-4 py-2 border">Dispatcher</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($fichiers as $fichier)
                                    <tr>
                                        <td class="px-4 py-2 border">{{ $fichier->nom_fichier }}</td>
                                        <td class="px-4 py-2 border">
                                            <a href="{{ route('fichiers.visualiser', $fichier->id) }}" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                                                Voir
                                            </a>
                                        </td>
                                        <td class="px-4 py-2 border">
                                            <a href="{{ route('fichiers.dispatch', $fichier->id) }}" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                                                Dispatch
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</x-app-layout>
