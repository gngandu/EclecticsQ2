<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model {

    use HasFactory;

    // Allow mass assignment for the following fields
    protected $fillable = [
        'customer_id', 'product_id', 'amount_applied', 'amount_disbursed', 'amount_repaid', 'status', 'balance',
    ];

    // Relationships
    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function product() {
        return $this->belongsTo(LoanProduct::class);
    }
}
