<?php

namespace Database\Seeders;

use App\Models\Customers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customers::create([
            'name' => "Imam Firgantoro",
            'address' => 'Jalan Terusan Pasir Koja No.347',
            'phone' => "081260757348",
            'cardID' => "5171044512020003",
        ]);
    }
}
