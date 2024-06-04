<?php

namespace App\Models;

use App\Http\Controllers\DormController;
use App\Http\Controllers\RoomImageController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
