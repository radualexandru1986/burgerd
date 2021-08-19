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
			'email' => 'radu.c.alexandru@gmail.com',
			'email_verified_at' => now(),
			'password' => Hash::make('aJz}I%AdYf$cQM[u>LP6k9$^'),
			'created_at' => now(),
			'role' => 'admin',
			'remember_token'=> '2134567890dfghjk',
			'updated_at' => now()
		]);
		
		DB::table('users')->insert([
			'name' => 'Alex',
			'email' => 'radu.c.alexandru@hotmail.com',
			'email_verified_at' => now(),
			'password' => Hash::make('aJz}I%AdYf$cQM[u>LP6k9$^'),
			'created_at' => now(),
			'role' => 'admin',
			'remember_token'=> 'efrgthynbtrvsea',
			'updated_at' => now()
		]);
		
		DB::table('users')->insert([
			'name' => 'Claudiu',
			'email' => 'claudiu530y@gmail.com',
			'email_verified_at' => now(),
			'password' => Hash::make('aJz}I%AdYf$cQM[u>LP6k9$^'),
			'created_at' => now(),
			'remember_token'=> 'efrgthynbtrvsea',
			'updated_at' => now()
		]);
    }
}
