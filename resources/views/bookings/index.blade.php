{{-- resources/views/bookings/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Booking Saya') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($bookings->isEmpty())
                        <p>Anda belum memiliki booking apa pun.</p>
                        <a href="{{ route('rooms.index') }}" class="text-blue-600 hover:underline">Pesan Ruangan
                            Sekarang</a>
                    @else
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Booking Anda:</h3>
                        <ul class="divide-y divide-gray-200">
                            @foreach ($bookings as $booking)
                                <li class="py-4 flex justify-between items-center">
                                    <div>
                                        <p class="text-sm font-semibold">Kode Booking: <span
                                                class="text-indigo-600">{{ $booking->booking_code }}</span></p>
                                        <p class="text-sm text-gray-600">Ruangan:
                                            {{ $booking->seat->room->name ?? 'N/A' }} - Kursi:
                                            {{ $booking->seat->name ?? 'N/A' }}</p>
                                        <p class="text-sm text-gray-600">Waktu Booking:
                                            {{ $booking->booking_time->format('d M Y H:i') }}</p>
                                        <p class="text-sm text-gray-600 mt-2">Status: <span {{-- Tambahkan kelas mt-2 di sini --}}
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
                                        </p>
                                    </div>
                                    <a href="{{ route('bookings.show', ['booking' => $booking->id]) }}"
                                        class="text-indigo-600 hover:text-indigo-900 font-semibold">Lihat Detail</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
