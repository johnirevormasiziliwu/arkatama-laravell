<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Customer::create([
        //     'nama' => 'Awin Goro',
        //     'email' => 'awin@gmail.com',
        //     'alamat' => 'Denpasar,Bali',
        // ]);

        // Customer::create([
        //     'nama' => 'Rosmin Powance',
        //     'email' => 'rosmin@gmail.com',
        //     'alamat' => 'Jakarta',
        // ]);

        Customer::factory()->count(10)->create();
    }
}