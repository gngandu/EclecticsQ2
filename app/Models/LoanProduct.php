<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanProduct extends Model
{
    use HasFactory;
    
    // Allow mass assignment for the following fields
    protected $fillable = [
        'name', 'code', 'min_amount', 'max_amount', 'interest_rate', 'currency'
    ];
}
