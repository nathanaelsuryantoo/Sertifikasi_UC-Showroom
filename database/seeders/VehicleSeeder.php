<?php

namespace Database\Seeders;

use App\Models\Cars;
use App\Models\Motorbikes;
use App\Models\Trucks;
use App\Models\Vehicles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehicle = Vehicles::create([
            'model' => '4Runner',
            'year' => 1984,
            'totalPassenger' => 7,
            'manufacture' => 'Toyota',
            'price' => '850000000',
            'imagePath' => '4runner.jpeg'
        ]);

        Cars::create([
            'vehicles_id' => $vehicle->id,
            'fuelType' => 'Diesel',
            'trunkSize' => 1400
        ]);

        $vehicle = Vehicles::create([
            'model' => 'KLX 150',
            'year' => 2013,
            'totalPassenger' => 1,
            'manufacture' => 'Kawasaki',
            'price' => '40000000',
            'imagePath' => 'klx.jpeg'
        ]);

        Motorbikes::create([
            'vehicles_id' => $vehicle->id,
            'fuelCapacity' => 8,
            'storageSize' => 5,
        ]);

        $vehicle = Vehicles::create([
            'model' => 'Elf NMR 71T HD 5.8',
            'year' => 2020,
            'totalPassenger' => 3,
            'manufacture' => 'Isuzu',
            'price' => '975000000',
            'imagePath' => 'elfgiga.jpeg'
        ]);

        Trucks::create([
            'vehicles_id' => $vehicle->id,
            'cargoSize' => 8250,
            'tiresCount' => 6
        ]);
    }
}
