<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_statuses')->insert([
        	'name'=>'pendingVerification'
		]);
        
        DB::table('order_statuses')->insert([
        	'name'=>'processing'
		]);
        
        DB::table('order_statuses')->insert([
        	'name'=>'ready'
		]);
        
        DB::table('order_statuses')->insert([
        	'name'=>'inTransit'
		]);
        
        DB::table('order_statuses')->insert([
        	'name'=>'delivered'
		]);
        
        DB::table('order_statuses')->insert([
        	'name'=>'verified'
		]);
    }
}
