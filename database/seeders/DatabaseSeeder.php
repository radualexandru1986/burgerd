<?php

namespace Database\Seeders;

use App\Models\Settings;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->call([
			//ItemSeeder::class,
			UserSeeder::class,
			//CustomerSeeder::class,
			//OrderStatus::class,
			//SettingsSeeder::class
		]);
    }
}
