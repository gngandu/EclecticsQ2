<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model {

    use HasFactory;

    // Allow mass assignment for the following fields
    protected $fillable = [
        'name', 'email', 'dob', 'phone_number', 'id_number', 'address'
    ];
}
