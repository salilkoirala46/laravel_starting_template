<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    protected $model = \App\Models\Car::class;

    public function definition()
    {
        return [
            'type' => $this->faker->randomElement(['SUV', 'Sedan', 'Truck', 'Hatchback']),
            'make' => $this->faker->company(), // Fake car company name
            'model' => $this->faker->word(), // Fake car model name
            'year' => $this->faker->numberBetween(1990, 2023), // Random year
            'fuel-type' => $this->faker->randomElement(['Petrol', 'Diesel', 'Electric', 'Hybrid']),
            'body-type' => $this->faker->randomElement(['Compact', 'Coupe', 'Crossover', 'Convertible']),
            'variant-t' => $this->faker->randomElement(['Base', 'SE', 'XLE', 'Limited']),
            'imagePath' => 'images/default.jpg', // Default image path
        ];
    }
}
