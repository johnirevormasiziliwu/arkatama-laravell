<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::create([
            'customer_id' => 1,
            'tanggal_order' => '2023-06-10',
            'jumlah_total' => 15
        ]);

        Order::create([
            'customer_id' => 1,
            'tanggal_order' => '2023-06-10',
            'jumlah_total' => 15
        ]);
    }
}