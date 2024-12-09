<?php

namespace App\Models;

use App\Http\Controllers\DormController;
use App\Http\Controllers\RoomImageController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tipe',
        'harga',
        'deskripsi',
        'status',
        'dorm_id'
    ];

    public function dorms()
    {
        return $this->belongsTo(Dorm::class, 'dorm_id');
    }


    public function roomImages()
    {
        return $this->hasMany(RoomImage::class);
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class, 'room_facilities');
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when(
            $filters['kost'] ?? false,
            fn ($query, $kost) =>
            $query->whereHas('dorms', fn ($query) => $query->where('nama', $kost))
        );
    }

    public function scopeHome(Builder $query, array $filters): void
    {
        $query->when(
            $filters['cat'] ?? false,
            fn ($query, $cat) =>
            $query->whereHas('dorms', fn ($query) => $query->where('jenis', $cat))
        );
        $query->when(
            $filters['location'] ?? false,
            fn ($query, $location) =>
            $query->whereHas('dorms.locations', fn ($query) => $query->where('nama', $location))
        );
    }
}
