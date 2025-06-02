<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable implements FilamentUser
{
    use Notifiable;

    protected $guarded = []; // Sesuaikan dengan kolom-kolom yang ingin Anda izinkan diisi

    // Metode ini penting agar Filament tahu siapa yang bisa mengakses panel admin
    public function canAccessPanel(Panel $panel): bool
    {
        // Di sini Anda bisa menambahkan logika pengecekan role atau status admin
        // Contoh: hanya user dengan kolom 'is_admin' true yang bisa login ke Filament
        return $this->is_admin; // Asumsi ada kolom `is_admin` di tabel `admins`
    }

    // Jika Anda menggunakan Filament Breezy, Anda mungkin perlu menambahkan HasApiTokens, dll.
    // use Laravel\Sanctum\HasApiTokens;
    // class Admin extends Authenticatable implements FilamentUser
    // {
    //     use HasApiTokens, Notifiable;
    //     // ...
    // }
}
