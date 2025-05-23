<nav class="bg-white border-b shadow-sm fixed w-full z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex-shrink-0">
                <a href="{{ route('dashboard') }}" class="text-2xl font-bold text-indigo-600">WarnetBooking</a>
            </div>
            <div class="hidden md:flex space-x-8">
                <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-indigo-600 font-medium">Dashboard</a>
                <a href="{{ route('rooms.index') }}" class="text-gray-700 hover:text-indigo-600 font-medium">Rooms</a>
                {{-- <a href="{{ route('seats.index') }}" class="text-gray-700 hover:text-indigo-600 font-medium">Seats</a>
                <a href="{{ route('bookings.index') }}"
                    class="text-gray-700 hover:text-indigo-600 font-medium">Bookings</a> --}}
            </div>
            <div class="flex items-center space-x-4">
                <span class="hidden md:inline-block text-sm text-gray-600">{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                        class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 text-sm font-medium">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
