<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <a href="{{ route('rooms.index') }}"
            class="bg-indigo-50 hover:bg-indigo-100 transition p-5 rounded-lg border border-indigo-200 shadow-sm">
            <div class="text-indigo-600 font-semibold text-lg">Lihat Ruangan</div>
            <p class="text-sm text-gray-500">Lihat daftar ruangan yang tersedia di warnet.</p>
        </a>

        <a href="{{ route('bookings.show', 1) }}"
            class="bg-indigo-50 hover:bg-indigo-100 transition p-5 rounded-lg border border-indigo-200 shadow-sm">
            <div class="text-indigo-600 font-semibold text-lg">Riwayat Booking</div>
            <p class="text-sm text-gray-500">Cek daftar booking milikmu.</p>
        </a>
    </div>
</x-app-layout>

{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Selamat datang, {{ auth()->user()->name }}</h3>
                <p class="mb-4 text-gray-700">Silakan pilih salah satu menu berikut:</p>

                <div class="space-x-4">
                    <a href="{{ route('rooms.index') }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Lihat Ruangan</a>
                    <a href="{{ route('bookings.show', 1) }}"
                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Lihat Booking</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

{{-- <x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-xl p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Selamat datang, {{ Auth::user()->name }}</h2>
                <p class="text-gray-600 mb-6">Silakan pilih salah satu menu berikut:</p>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    <a href="{{ route('rooms.index') }}"
                        class="bg-indigo-50 hover:bg-indigo-100 transition p-5 rounded-lg border border-indigo-200 shadow-sm">
                        <div class="text-indigo-600 font-semibold text-lg">Lihat Ruangan</div>
                        <p class="text-sm text-gray-500">Lihat daftar ruangan yang tersedia di warnet.</p>
                    </a>

                    <a href="{{ route('seats.index') }}"
                        class="bg-indigo-50 hover:bg-indigo-100 transition p-5 rounded-lg border border-indigo-200 shadow-sm">
                        <div class="text-indigo-600 font-semibold text-lg">Lihat Tempat Duduk</div>
                        <p class="text-sm text-gray-500">Pilih kursi sesuai keinginanmu.</p>
                    </a>

                    <a href="{{ route('bookings.show', 1) }}"
                        class="bg-indigo-50 hover:bg-indigo-100 transition p-5 rounded-lg border border-indigo-200 shadow-sm">
                        <div class="text-indigo-600 font-semibold text-lg">Riwayat Booking</div>
                        <p class="text-sm text-gray-500">Cek daftar booking milikmu.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
