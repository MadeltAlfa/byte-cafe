<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Ruangan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($rooms as $room)
                            <div
                                class="border rounded-lg overflow-hidden shadow hover:shadow-lg transition-shadow duration-300">
                                <img src="{{ asset('storage/' . $room->image) }}" alt="{{ $room->name }}"
                                    class="w-full h-48 object-cover">
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold">{{ $room->name }}</h3>
                                    <p class="text-gray-600">{{ $room->description }}</p>
                                    <div class="mt-4 flex justify-between items-center">
                                        <span
                                            class="px-2 py-1 text-sm rounded-full
                                            {{ $room->status === 'available' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $room->status === 'available' ? 'Tersedia' : 'Maintenance' }}
                                        </span>
                                        <span class="text-sm text-gray-500">Kapasitas: {{ $room->capacity }}
                                            orang</span>
                                    </div>
                                    <div class="mt-4">
                                        <a href="{{ route('rooms.show', $room) }}"
                                            class="block w-full text-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors duration-300">
                                            Pilih Ruangan
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
