<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        Car::create([
            'name' => 'Avanza G',
            'brand' => 'Toyota',
            'year' => 2021,
            'capacity' => 7,
            'price_per_day' => 400000,
            'status' => 'available',
        ]);

        Car::create([
            'name' => 'Brio Satya',
            'brand' => 'Honda',
            'year' => 2020,
            'capacity' => 5,
            'price_per_day' => 300000,
            'status' => 'available',
        ]);

        Car::create([
            'name' => 'Xpander Sport',
            'brand' => 'Mitsubishi',
            'year' => 2022,
            'capacity' => 7,
            'price_per_day' => 450000,
            'status' => 'available',
        ]);
    }
}
