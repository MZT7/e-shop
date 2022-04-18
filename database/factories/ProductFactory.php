<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->paragraph(),
            'type' => "men",
            'image' => 'https://live.staticflickr.com/734/21139895534_d074e595c9_b.jpg',
            'price' => $this->faker->randomFloat(2, 0, 10000),

        ];
    }
}
