<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Item;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    protected $model = Item::class;
    
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Milk', 'Bread', 'Cake', 'Ham', 'Waffle']),
            'expiry_date' => fake()->dateTimeBetween('-1 weeks', '+2 weeks'),
            'icon_color' => fake()->hexColor(),
            'type_id' => fake()->numberBetween(1,6),
            'icon_id' => fake()->numberBetween(1,2),
            'user_id' => fake()->numberBetween(1,2),
        ];
    }
}
