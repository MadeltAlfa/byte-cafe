<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            abort(403);
        }

        return view('bookings.show', compact('booking'));
    }
}
