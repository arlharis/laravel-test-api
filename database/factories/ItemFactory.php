<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    public function definition()
    {
        return [
          'name'        => $this->faker->name,
          'description' => $this->faker->sentence,
          'slug'        => $this->faker->slug 
        ];
    }
}
