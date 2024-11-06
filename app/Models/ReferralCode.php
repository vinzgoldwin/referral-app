<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferralCode extends Model
{
    protected $fillable = ['code', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
