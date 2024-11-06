<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    protected $fillable = ['user_id', 'amount', 'week_start_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
