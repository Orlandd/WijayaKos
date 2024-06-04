<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function finances()
    {
        return $this->belongsToMany(Finance::class, 'financial_relations');
    }
}
