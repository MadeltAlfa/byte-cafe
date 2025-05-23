{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Booking') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold">Kode Booking: {{ $booking->booking_code }}</h3>
                        <div class="mt-2">
                            <span
                                class="px-2 py-1 text-sm rounded-full
                                {{ $booking->status === 'pending'
                                    ? 'bg-yellow-100 text-yellow-800'
                                    : ($booking->status === 'approved'
                                        ? 'bg-green-100 text-green-800'
                                        : 'bg-red-100 text-red-800') }}">
                                {{ $booking->status === 'pending'
                                    ? 'Menunggu Verifikasi'
                                    : ($booking->status === 'approved'
                                        ? 'Disetujui'
                                        : 'Ditolak') }}
                            </span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="font-medium">Detail Ruangan:</h4>
                            <ul class="mt-2 space-y-2">
                                <li>Nama: {{ $booking->seat->room->name }}</li>
                                <li>Deskripsi: {{ $booking->seat->room->description }}</li>
                                <li>Kapasitas: {{ $booking->seat->room->capacity }} orang</li>
                            </ul>
                        </div>

                        <div>
                            <h4 class="font-medium">Detail Kursi:</h4>
                            <ul class="mt-2 space-y-2">
                                <li>Nomor: {{ $booking->seat->seat_number }}</li>
                                <li>Status:
                                    <span
                                        class="px-2 py-1 text-xs rounded-full
                                        {{ $booking->seat->status === 'available' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $booking->seat->status === 'available' ? 'Tersedia' : 'Maintenance' }}
                                    </span>
                                </li>
                                @if ($booking->seat->computer_spec)
                                    <li>Spesifikasi Komputer: {{ $booking->seat->computer_spec }}</li>
                                @endif
                            </ul>
                        </div>
                    </div>

                    <div class="mt-6 p-4 bg-blue-50 rounded-lg">
                        <h4 class="font-medium text-blue-800">Instruksi:</h4>
                        <p class="mt-2 text-blue-700">
                            Silakan tunjukkan kode booking ini ke admin untuk verifikasi.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Booking') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold">Kode Booking: {{ $booking->booking_code }}</h3>
                        <div class="mt-2">
                            <span
                                class="px-2 py-1 text-sm rounded-full
                                {{ $booking->status === 'pending'
                                    ? 'bg-yellow-100 text-yellow-800'
                                    : ($booking->status === 'approved'
                                        ? 'bg-green-100 text-green-800'
                                        : 'bg-red-100 text-red-800') }}">
                                {{ $booking->status === 'pending'
                                    ? 'Menunggu Verifikasi'
                                    : ($booking->status === 'approved'
                                        ? 'Disetujui'
                                        : 'Ditolak') }}
                            </span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="font-medium">Detail Ruangan:</h4>
                            <ul class="mt-2 space-y-2">
                                <li>Nama: {{ $booking->seat->room->name }}</li>
                                <li>Deskripsi: {{ $booking->seat->room->description }}</li>
                                <li>Kapasitas: {{ $booking->seat->room->capacity }} orang</li>
                            </ul>
                        </div>

                        <div>
                            <h4 class="font-medium">Detail Kursi:</h4>
                            <ul class="mt-2 space-y-2">
                                <li>Nomor: {{ $booking->seat->seat_number }}</li>
                                <li>Status:
                                    <span
                                        class="px-2 py-1 text-xs rounded-full
                                        {{ $booking->seat->status === 'available' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $booking->seat->status === 'available' ? 'Tersedia' : 'Maintenance' }}
                                    </span>
                                </li>
                                @if ($booking->seat->computer_spec)
                                    <li>Spesifikasi Komputer: {{ $booking->seat->computer_spec }}</li>
                                @endif
                            </ul>
                        </div>
                    </div>

                    <div class="mt-6 p-4 bg-blue-50 rounded-lg">
                        <h4 class="font-medium text-blue-800">Instruksi:</h4>
                        <p class="mt-2 text-blue-700">
                            Silakan tunjukkan kode booking ini ke admin untuk verifikasi.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
