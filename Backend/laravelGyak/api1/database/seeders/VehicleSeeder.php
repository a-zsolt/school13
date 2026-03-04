<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vehicle::create([
            'brand' => 'Ford',
            'model' => 'Transit',
            'type' => 'van',
            'license_plate' => 'ABC-123',
            'hp' => 130,

        ]);
        Vehicle::create([
            'brand' => 'Mercedes',
            'model' => 'Sprinter',
            'type' => 'bus',
            'license_plate' => 'DEF-456',
            'hp' => 163,

        ]);
        Vehicle::create([
            'brand' => 'BMW',
            'model' => '320d',
            'type' => 'wagon',
            'license_plate' => 'GHI-789',
            'hp' => 190,

        ]);
        Vehicle::create([
            'brand' => 'Audi',
            'model' => 'A5',
            'type' => 'cabrio',
            'license_plate' => 'JKL-321',
            'hp' => 252,

        ]);
    }
}
