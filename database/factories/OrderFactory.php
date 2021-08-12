<?php

namespace Database\Factories;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => 1,
			'total' => rand(8, 20),
			'payment_method' => 'cash',
			'comments' => 'some comments',
			'status' => 'processing',
			'created_at' => Carbon::today()
        ];
    }
}
