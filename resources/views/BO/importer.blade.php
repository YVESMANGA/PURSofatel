<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                            <h2>Importer les demandes</h2>

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
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



</x-app-layout>
