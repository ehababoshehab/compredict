<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $createdAt = $this->faker->dateTimeBetween('-2 years', 'now');

        return [
            'name' => str_replace(".", "", $this->faker->unique()->text(10)),
            'created_at' => $createdAt
        ];
    }
}
