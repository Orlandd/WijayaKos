<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'image'
    ];

    public function dorms()
    {
        return $this->belongsToMany(Dorm::class, 'dorm_locations');
    }
}
