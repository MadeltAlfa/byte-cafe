<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
     public function index()
    {
        $rooms = Room::where('status', 'available')->get();
        return view('rooms.index', compact('rooms'));
    }

    public function show(Room $room)
    {
        if ($room->status !== 'available') {
            return redirect()->route('rooms.index')->with('error', 'Ruangan tidak tersedia');
        }

        $seats = $room->seats()->where('status', 'available')->get();
        return view('rooms.show', compact('room', 'seats'));
    }

    public function seat(Seat $seat)
    {
        if ($seat->status !== 'available') {
            return redirect()->back()->with('error', 'Kursi tidak tersedia');
        }

        return view('seats.show', compact('seat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'seat_id' => 'required|exists:seats,id',
        ]);

        $seat = Seat::findOrFail($request->seat_id);

        if ($seat->status !== 'available') {
            return redirect()->back()->with('error', 'Kursi tidak tersedia');
        }

        $booking = Booking::create([
            'user_id' => auth()->id(),
            'seat_id' => $seat->id,
            'booking_code' => Str::uuid(),
            'status' => 'pending',
            'booking_time' => now(),
        ]);

        return redirect()->route('bookings.show', $booking)->with('success', 'Booking berhasil dibuat. Silakan tunjukkan kode booking ke admin.');
    }

    public function showBooking(Booking $booking)
    {
        if ($booking->user_id !== auth()->id()) {
            abort(403, 'Anda tidak berhak melihat booking ini.');
        }

        return view('bookings.show', compact('booking'));
    }

    public function myBookings()
    {
        // Pastikan user sedang login sebelum mencoba mengambil booking
        if (Auth::check()) {
            // Ambil semua booking yang dimiliki oleh user yang sedang login
            // Urutkan dari yang terbaru atau sesuai kebutuhan Anda
            $bookings = Auth::user()->bookings()->orderBy('created_at', 'desc')->get();
            return view('bookings.index', compact('bookings')); // Menggunakan view 'bookings.index'
        }

        // Jika user tidak login (seharusnya sudah dicegah oleh middleware 'auth'),
        // bisa diarahkan kembali atau tampilkan pesan error
        return redirect()->route('login')->with('error', 'Anda harus login untuk melihat booking Anda.');
    }
}
