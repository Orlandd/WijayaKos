<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nominal',
        'deskripsi',
        'tanggal',
        'user_id',
        'booking_id'
    ];

    public function types()
    {
        return $this->belongsToMany(FinancialType::class, 'financial_relations');
    }

    public function bookings()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
