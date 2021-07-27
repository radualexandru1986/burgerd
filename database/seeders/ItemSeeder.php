<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//The turk
		DB::table('items')->insert([
			'name' => 'The Turk',
			'photo' => 'images/menu/TheTurk.png',
			'price' => 9.20,
			'class' => 'burgers'
		]);
		
		DB::table('items')->insert([
			'name' => 'Double Animal',
			'photo' => 'images/menu/DoubleAnimal.png',
			'price' => 9.20,
			'class' => 'burgers'
		]);
		
		DB::table('items')->insert([
			'name' => 'Vegan Prime',
			'photo' => 'images/menu/VeganPrime.png',
			'price' => 8.10,
			'class' => 'vegan'
		]);
		
		DB::table('items')->insert([
			'name' => 'Juicy Lucy',
			'photo' => 'images/menu/JuicyLucy.png',
			'price' => 7.50,
			'class' => 'burgers'
		]);
		
		DB::table('items')->insert([
			'name' => 'Hot Dog',
			'photo' => 'images/menu/HotDog.png',
			'price' => 7.50,
			'class' => 'burgers'
		]);
		
		DB::table('items')->insert([
			'name' => 'Chicken Salad',
			'photo' => 'images/menu/salad.jpg',
			'price' => 7.50,
			'class' => 'salad'
		]);
		
		DB::table('items')->insert([
			'name' => 'Cheese Bits',
			'photo' => 'images/menu/cheeseBits.jpg',
			'price' => 4.00,
			'class' => 'sides'
		]);
		
		DB::table('items')->insert([
			'name' => 'Onion Rings',
			'photo' => 'images/menu/OnionRings.jpg',
			'price' => 4.00,
			'class' => 'sides'
		]);
		
		DB::table('items')->insert([
			'name' => 'Mozzarella Sticks',
			'photo' => 'images/menu/MozzarellaSticks.jpg',
			'price' => 4.00,
			'class' => 'sides'
		]);
		
		DB::table('items')->insert([
			'name' => 'Coca Cola Diet',
			'photo' => 'images/menu/CocaColaDiet.jpg',
			'price' => 1,
			'class' => 'beverages'
		]);
		
		DB::table('items')->insert([
			'name' => 'Coca Cola',
			'photo' => 'images/menu/CocaCola.jpg',
			'price' => 1,
			'class' => 'beverages'
		]);
		
		DB::table('items')->insert([
			'name' => 'Fanta',
			'photo' => 'images/menu/Fanta.jpg',
			'price' => 1,
			'class' => 'beverages'
		]);
		
		DB::table('items')->insert([
			'name' => 'Sprite',
			'photo' => 'images/menu/Sprite.jpg',
			'price' => 1,
			'class' => 'beverages'
		]);
    }
}
