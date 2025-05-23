<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Room;
use App\Models\Seat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Admin Byte Cafe',
            'email' => 'byetecafe@gmail.com',
            'password' => Hash::make('bytecafe12345'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Pelanggan_test',
            'email' => 'pelanggan@test.com',
            'password' => Hash::make('testing123456'),
            'role' => 'pelanggan',
        ]);

        $room1 = Room::create([
            'name' => 'Ruangan Reguler',
            'capacity' => 20,
            'description' => 'Ruangan dengan fasilitas lengkap',
            'image' => 'rooms/room1.jpg',
            'status' => 'available',
        ]);

        $room2 = Room::create([
            'name' => 'Ruangan Hemat',
            'capacity' => 30,
            'description' => 'Ruangan dengan 30 unit komputer',
            'image' => 'rooms/room2.jpg',
            'status' => 'available',
        ]);

        for ($i = 1; $i <= 20; $i++) {
            Seat::create([
                'room_id' => $room1->id,
                'seat_number' => 'M-' . $i,
                'status' => 'available',
                'computer_spec' => "Processor: Intel Core i5\nRAM: 8GB\nStorage: 256GB SSD\nMonitor: 24 inch",
            ]);
        }

        for ($i = 1; $i <= 30; $i++) {
            Seat::create([
                'room_id' => $room2->id,
                'seat_number' => 'K-' . $i,
                'status' => 'available',
                'computer_spec' => "Processor: Intel Core i7\nRAM: 16GB\nStorage: 512GB SSD\nMonitor: 27 inch",
            ]);
        }
    }
}
