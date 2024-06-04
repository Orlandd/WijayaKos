<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'mulai',
        'akhir',
        'harga',
        'bukti',
        'jenis',
        'status',
        'user_id',
        'room_id',
    ];

    public function rooms()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
