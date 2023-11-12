<?php

namespace Database\Seeders;

use App\Models\OrderItems;
use App\Models\Orders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order = Orders::create([
            'customer_id' => 1,
        ]);

        OrderItems::create([
            'orders_id' => $order->id,
            'vehicles_id' => 1,
        ]);
    }
}
