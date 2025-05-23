<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'capacity',
        'description',
        'image',
        'status',
    ];

    public function seats()
    {
        return $this->hasMany(Seat::class);
    }

    public function availableSeats()
    {
        return $this->seats()->where('status', 'available');
    }
}
