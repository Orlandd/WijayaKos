<?php

namespace App\Models;

use App\Http\Controllers\RoomController;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dorm extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'lokasi',
        'deskripsi',
        'jenis'
    ];

    public function locations()
    {
        return $this->belongsToMany(Location::class, 'dorm_locations');
    }

    public function images()
    {
        return $this->hasMany(DormImage::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class, 'dorm_id');
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when(
            $filters['location'] ?? false,
            fn ($query, $location) =>
            $query->whereHas('locations', fn ($query) => $query->where('nama', $location))
        );

        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>
            $query->where('nama', 'like', '%' . $search . '%')
        );
    }
}
