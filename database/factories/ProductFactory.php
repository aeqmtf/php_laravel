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
            'name' => $this->faker->text(191),
            'description' => $this->faker->text(),
            'product_category_id' => 1,
            'price' => $this->faker->numerify(),
            'stock' => $this->faker->numerify(),
            'stock_defective' => $this->faker->numerify(),
        ];
    }
}
