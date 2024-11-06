<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    protected $fillable = [
        'user_id',
        'referral_code',
        'commission_rate',
    ];

    // Relationships

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function referrals()
    {
        return $this->hasMany(Referral::class);
    }

    public function commissions()
    {
        return $this->hasMany(Commission::class);
    }

    public function payouts()
    {
        return $this->hasMany(Payout::class);
    }

    // Accessor for Referral Link
    public function getReferralLinkAttribute()
    {
        return route('register', ['referral_code' => $this->referral_code]);
    }

}
