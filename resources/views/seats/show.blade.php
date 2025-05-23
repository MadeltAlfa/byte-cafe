{{-- <x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-flex items-center">
                    <a href="{{ route('rooms.show', $seat->room) }}" class="text-indigo-600 hover:text-indigo-800 mr-2">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <i class="fas fa-chair mr-2"></i>Kursi #{{ $seat->seat_number }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">Ruangan: {{ $seat->room->name }}</p>
            </div>
            <span
                class="px-3 py-1 rounded-full text-sm font-semibold
                {{ $seat->status === 'available' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                {{ $seat->status === 'available' ? 'Tersedia' : 'Maintenance' }}
            </span>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
                <!-- Seat Header -->
                <div class="bg-gradient-to-r from-indigo-600 to-indigo-700 px-6 py-4">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-white">
                            <i class="fas fa-chair mr-2"></i>Detail Kursi
                        </h3>
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-indigo-800 text-white">
                            #{{ $seat->seat_number }}
                        </span>
                    </div>
                </div>

                <!-- Seat Content -->
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Ruangan</h4>
                            <p class="text-gray-900">{{ $seat->room->name }}</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Status</h4>
                            <p class="text-gray-900 capitalize">{{ $seat->status }}</p>
                        </div>
                    </div>

                    @if ($seat->computer_spec)
                        <div class="mb-6">
                            <h4 class="text-sm font-semibold text-gray-900 mb-2 flex items-center">
                                <i class="fas fa-desktop mr-2 text-indigo-600"></i>Spesifikasi Komputer
                            </h4>
                            <div class="bg-gray-50 p-4 rounded-lg whitespace-pre-line text-gray-800">
                                {{ $seat->computer_spec }}
                            </div>
                        </div>
                    @endif

                    @if ($seat->notes)
                        <div class="mb-6">
                            <h4 class="text-sm font-semibold text-gray-900 mb-2 flex items-center">
                                <i class="fas fa-sticky-note mr-2 text-indigo-600"></i>Catatan Tambahan
                            </h4>
                            <div class="bg-gray-50 p-4 rounded-lg whitespace-pre-line text-gray-800">
                                {{ $seat->notes }}
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('bookings.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="seat_id" value="{{ $seat->id }}">
                        <div class="mt-8 border-t border-gray-200 pt-6">
                            <div class="flex justify-end">
                                <button type="submit"
                                    class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-gradient-to-r from-indigo-600 to-indigo-700 hover:from-indigo-700 hover:to-indigo-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 smooth-transition hover-scale">
                                    <i class="fas fa-calendar-check mr-2"></i> Booking Sekarang
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Kursi #') . $seat->seat_number }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold">Kursi #{{ $seat->seat_number }}</h3>
                        <p class="text-gray-600">Ruangan: {{ $seat->room->name }}</p>
                        <div class="mt-2">
                            <span
                                class="px-2 py-1 text-sm rounded-full
                                {{ $seat->status === 'available' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $seat->status === 'available' ? 'Tersedia' : 'Maintenance' }}
                            </span>
                        </div>
                    </div>

                    @if ($seat->computer_spec)
                        <div class="mb-6">
                            <h4 class="font-medium">Spesifikasi Komputer:</h4>
                            <p class="mt-1 text-gray-600 whitespace-pre-line">{{ $seat->computer_spec }}</p>
                        </div>
                    @endif

                    @if ($seat->notes)
                        <div class="mb-6">
                            <h4 class="font-medium">Catatan:</h4>
                            <p class="mt-1 text-gray-600 whitespace-pre-line">{{ $seat->notes }}</p>
                        </div>
                    @endif

                    <form action="{{ route('bookings.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="seat_id" value="{{ $seat->id }}">
                        <button type="submit"
                            class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition-colors duration-300">
                            Booking Sekarang
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
