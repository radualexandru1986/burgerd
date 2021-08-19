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
			'price' => 8.50,
			'class' => 'burgers',
			'recipe'=> json_encode(['Bun', 'mayo', 'salad', 'cheese', 'tomato', 'beef burger', 'egg', 'bacon', 'pickles',  'sauce', 'ketchup']),
			'description' => 'This burger can satisfy your taste buds within seconds of biting in.
			 The egg is freshly cooked with the bacon and the beef, while the salad and the tomato bring a fresh taste creating an incredible bust of flavour.'
		]);
		
		DB::table('items')->insert([
			'name' => 'Double Animal',
			'photo' => 'images/menu/DoubleAnimal.png',
			'price' => 9.50,
			'class' => 'burgers',
			'recipe'=> json_encode(['Bun', 'mayo', 'salad', 'tomato', 'beef burger', 'pickles', 'ketchup']),
			'description' => 'Double the taste or double nothing. Listen to your instincts and satisfy your animal hunger with this burger.'
		]);
		
		DB::table('items')->insert([
			'name' => 'Vegan Prime',
			'photo' => 'images/menu/VeganPrime.png',
			'price' => 8.50,
			'class' => 'vegan',
			'recipe'=> json_encode(['Bun', 'vegan', 'mayo', 'salad', 'tomato', 'vegan burger', 'pickles', 'ketchup']),
			'description' => 'Healthy, natural, fresh and tasty, no animal was injured during the making of this burger.'
		]);
		
		DB::table('items')->insert([
			'name' => 'Atomic Chicken',
			'photo' => 'images/menu/JuicyLucy.png',
			'price' => 8.50,
			'class' => 'burgers',
			'recipe'=> json_encode(['bun', 'garlic', 'mayo', 'salad', 'tomatoes', 'red onion', 'pickles', 'grilled chicken breast', 'sauce']),
			'description' => "Shakespeare didn't eat chicken burgers, he was too caught up with Ham-let."
		]);
		
		DB::table('items')->insert([
			'name' => 'Hot Dog',
			'photo' => 'images/menu/HotDog.png',
			'price' => 7.50,
			'class' => 'burgers',
			'recipe'=> json_encode(['bun', 'hot', 'dog', 'sausage', 'salad', 'tomato', 'caramelized onion', 'bacon', 'mustard', 'ketchup']),
			'description' => 'This one is a bit more unique, it’s not your basic simple hot dog. By combining different fresh ingredients, special cooked red onions and high quality hot dog sausages, we created something full of rich flavour that let’s you wanting more.'
		]);
		
		DB::table('items')->insert([
			'name' => 'Chicken Salad',
			'photo' => 'images/menu/salad.jpg',
			'price' => 5.00,
			'class' => 'salad',
			'recipe'=> json_encode(['salad', 'onion', 'tomatoes', 'cucumber', 'chicken breast', 'salad cream']),
			'description' => 'If you crave meat, but you care about your diet, this one is for you. Made with fresh vegetables and good quality chicken breast, our salad is perfect for a light delicious meal.'
		]);
		
//		DB::table('items')->insert([
//			'name' => 'Cheese Bits',
//			'photo' => 'images/menu/cheeseBits.jpg',
//			'price' => 3.00,
//			'class' => 'sides',
//			'description' => '	Treat yourself with rewards of cheese balls that melt in your mouth.'
//		]);
		
		DB::table('items')->insert([
			'name' => 'Onion Rings',
			'photo' => 'images/menu/OnionRings.jpg',
			'price' => 3.00,
			'class' => 'sides',
			'description'=>'Delicious circles of fried onion ring.'
		]);
		
		DB::table('items')->insert([
			'name' => 'Mozzarella Sticks',
			'photo' => 'images/menu/MozzarellaSticks.jpg',
			'price' => 4.00,
			'class' => 'sides',
			'description' => '	Melted hot mozzarella cheese, covered in a fried crispy crust.'
		]);
		
		DB::table('items')->insert([
			'name' => 'Fries',
			'photo' => 'images/menu/Fries.jpg',
			'price' => 2.00,
			'class' => 'sides'
		]);
		
		DB::table('items')->insert([
			'name' => 'Chicken Nuggets',
			'photo' => 'images/menu/ChickenNuggets.jpg',
			'price' => 3.00,
			'class' => 'sides',
			'description'=> 'No caption needed. Just Chicken Nuggets!'
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
