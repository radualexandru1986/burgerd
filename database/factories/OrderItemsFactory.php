<?php

namespace Database\Factories;

use App\Models\OrderItems;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderItemsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderItems::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id' => rand(1, 100),
			'item_id' => rand(1, 5),
			'drink' => rand(12, 15)
        ];
    }
}
