<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


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

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when(
            $filters['kost'] ?? false,
            fn ($query, $kost) =>
            $query->with('rooms.dorms', 'users')->whereHas('rooms.dorms', fn ($query) => $query->where('nama', $kost))
        );

        $query->when(
            $filters['status'] ?? false,
            fn ($query, $status) =>
            $query->with('rooms.dorms', 'users')->where('status', $status)
        );

        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>
            $query->with('rooms.dorms', 'users')->whereHas('users', fn ($query) => $query->where('name', 'like', '%' . $search . '%'))
        );
    }
}
