<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//    	Customer::factory()
//			->has(Order::factory()->count(rand(1,5)))
//			->count(10)
//			->create();
    	Customer::factory()
			->has(Order::factory())
			->count(10)
			->create();
    }
}
