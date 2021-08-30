<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('users')->insert([
			'name' => 'Admin',
			'email' => 'emilysburgers@gmail.com',
			'email_verified_at' => now(),
			'password' => Hash::make('aJz}I%AdYf$cQM[u>LP6k9$^'),
			'created_at' => now(),
			'role' => 'admin',
			'remember_token'=> 'efrgthynbtrvsea',
			'updated_at' => now()
		]);
    }
}
