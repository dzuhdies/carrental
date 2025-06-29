<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand',
        'year',
        'capacity',
        'price_per_day',
        'image',
        'status',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
