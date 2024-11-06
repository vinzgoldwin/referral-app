<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payout extends Model
{
    use HasFactory;

    protected $fillable = [
        'affiliate_id',
        'amount',
        'status',
    ];

    const STATUS_PENDING = 'pending';
    const STATUS_APPROVED = 'approved';
    const STATUS_REJECTED = 'rejected';

    public function affiliate()
    {
        return $this->belongsTo(Affiliate::class);
    }
}
