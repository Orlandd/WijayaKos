<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialRelation extends Model
{
    use HasFactory;

    protected $fillable = [
        'finance_id',
        'financial_type_id',
    ];
}
