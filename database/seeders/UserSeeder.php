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
			'name' => 'Allex',
			'email' => 'radu.c.alexandru@gmail.com',
			'email_verified_at' => now(),
			'password' => Hash::make('120'),
			'created_at' => now(),
			'remember_token'=> '2134567890dfghjk',
			'updated_at' => now()
		]);
    }
}
