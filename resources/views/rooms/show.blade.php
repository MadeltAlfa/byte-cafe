{{-- <x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-flex items-center">
                    <a href="{{ route('rooms.index') }}" class="text-indigo-600 hover:text-indigo-800 mr-2">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <i class="fas fa-door-open mr-2"></i>{{ $room->name }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">{{ $room->description }}</p>
            </div>
            <div class="flex items-center space-x-2">
                <span
                    class="px-3 py-1 rounded-full text-sm font-semibold
                    {{ $room->status === 'available' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                    {{ $room->status === 'available' ? 'Tersedia' : 'Maintenance' }}
                </span>
                <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-3 py-1 rounded-full">
                    {{ $room->capacity }} <i class="fas fa-user ml-1"></i>
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Room Info -->
            <div class="bg-white rounded-xl shadow-sm p-6 mb-8 border border-gray-100">
                <div class="flex flex-col md:flex-row gap-6">
                    <div class="md:w-1/3">
                        <div class="rounded-lg overflow-hidden shadow-md">
                            <img src="{{ asset('storage/' . $room->image) }}" alt="{{ $room->name }}"
                                class="w-full h-64 object-cover">
                        </div>
                    </div>
                    <div class="md:w-2/3">
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Detail Ruangan</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Nama
                                    Ruangan</h4>
                                <p class="text-gray-900">{{ $room->name }}</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Kapasitas
                                </h4>
                                <p class="text-gray-900">{{ $room->capacity }} orang</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Status
                                </h4>
                                <p class="text-gray-900 capitalize">{{ $room->status }}</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Jumlah
                                    Kursi</h4>
                                <p class="text-gray-900">{{ $seats->count() }} kursi tersedia</p>
                            </div>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Deskripsi</h4>
                            <p class="text-gray-900">{{ $room->description }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Seats -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold text-gray-900">
                        <i class="fas fa-chair mr-2"></i>Daftar Kursi Tersedia
                    </h3>
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-500">
                            Menampilkan {{ $seats->count() }} dari {{ $room->seats->count() }} kursi
                        </span>
                    </div>
                </div>

                @if ($seats->isEmpty())
                    <div class="text-center py-8">
                        <div class="mx-auto h-16 w-16 text-gray-400 mb-4">
                            <i class="fas fa-chair text-4xl"></i>
                        </div>
                        <h4 class="text-lg font-medium text-gray-900 mb-1">Tidak ada kursi tersedia</h4>
                        <p class="text-gray-500">Semua kursi dalam ruangan ini sedang tidak tersedia.</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                        @foreach ($seats as $seat)
                            <div
                                class="bg-white rounded-lg border border-gray-200 hover:border-indigo-300 hover:shadow-md transition-all duration-300 overflow-hidden">
                                <div class="p-4">
                                    <div class="flex justify-between items-start mb-2">
                                        <h4 class="font-semibold text-gray-900">
                                            <i class="fas fa-chair mr-2 text-indigo-600"></i>Kursi
                                            #{{ $seat->seat_number }}
                                        </h4>
                                        <span
                                            class="px-2 py-1 rounded-full text-xs font-semibold
                                    {{ $seat->status === 'available' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $seat->status === 'available' ? 'Tersedia' : 'Maintenance' }}
                                        </span>
                                    </div>
                                    @if ($seat->computer_spec)
                                        <div class="text-sm text-gray-600 mb-3 line-clamp-2">
                                            <i class="fas fa-desktop mr-1 text-gray-400"></i>
                                            {{ Str::limit($seat->computer_spec, 60) }}
                                        </div>
                                    @endif
                                    <div class="flex justify-end">
                                        <a href="{{ route('seats.show', $seat) }}"
                                            class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 smooth-transition">
                                            Pilih
                                            <i class="fas fa-chevron-right ml-1 text-xs"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout> --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Kursi - ') . $room->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold">{{ $room->name }}</h3>
                        <p class="text-gray-600">{{ $room->description }}</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($seats as $seat)
                            <div class="border rounded-lg p-4 hover:shadow-md transition-shadow duration-300">
                                <h4 class="font-medium">Kursi #{{ $seat->seat_number }}</h4>
                                <div class="mt-2">
                                    <span
                                        class="px-2 py-1 text-xs rounded-full
                                        {{ $seat->status === 'available' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $seat->status === 'available' ? 'Tersedia' : 'Maintenance' }}
                                    </span>
                                </div>
                                @if ($seat->status === 'available')
                                    <div class="mt-4">
                                        <a href="{{ route('seats.show', $seat) }}"
                                            class="block w-full text-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors duration-300">
                                            Pilih Kursi
                                        </a>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
