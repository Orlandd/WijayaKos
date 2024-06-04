<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DormImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'dorm_id',
    ];

    public function dorms()
    {
        return $this->belongsToMany(Dorm::class, 'dorm_images');
    }
}
