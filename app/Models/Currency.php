<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    // Define the fillable attributes
    protected $fillable = ['code', 'name'];

    // Disable timestamps if not needed
    public $timestamps = true;

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
