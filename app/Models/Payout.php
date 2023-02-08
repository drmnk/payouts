<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Enums\PayoutStatus;
use Illuminate\Database\Eloquent\Model;

class Payout extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => PayoutStatus::class
    ];

    protected $fillable = [
        'username', 'details', 'amount', 'currency'
    ];
}
